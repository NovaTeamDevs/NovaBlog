# 📦 راهنمای نصب و راه‌اندازی پروژه Laravel روی هاست cPanel لینوکس

این راهنما شامل مراحل کامل نصب و راه‌اندازی یک پروژه Laravel روی هاست لینوکسی با کنترل پنل **cPanel** است و هر دو حالت **با دسترسی به SSH** و **بدون دسترسی به SSH** را پوشش می‌دهد.

---

## ✅ ۱. آماده‌سازی هاست

1. وارد کنترل پنل cPanel شوید.
2. نسخه PHP را در بخش **Select PHP Version** یا **MultiPHP Manager** بررسی کنید. نسخه مناسب برای لاراول حداقل **PHP 8.1 یا بالاتر** است.
3. اکستنشن‌های زیر را فعال کنید:

   * `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `tokenizer`, `curl`, `xml`, `ctype`, `json`, `bcmath`

---

## ✅ ۲. آماده‌سازی پروژه و آپلود در هاست

1. روی محیط توسعه (لوکال)، این دستورات اجرا شود:

   ```bash
   composer install --no-dev --optimize-autoloader
   ```
2. پوشه `vendor/` در پروژه قرار گیرد.
3. پروژه فشرده (ZIP) شده و در مسیر مناسب هاست آپلود و Extract شود.

---

## ✅ ۳. تنظیم دایرکتوری public\_html

1. محتوای پوشه `public/` پروژه به مسیر `public_html/` منتقل شود.
2. در فایل `public_html/index.php` مسیرهای Autoload تصحیح گردد. مثال:

```php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
```

اگر پروژه در پوشه‌ای مانند `laravel-project` قرار دارد، مسیرها باید به شکل زیر اصلاح شوند:

```php
require __DIR__.'/../laravel-project/vendor/autoload.php';
$app = require_once __DIR__.'/../laravel-project/bootstrap/app.php';
```

---

## ✅ ۴. تنظیم فایل .env

فایل `.env` در هاست ویرایش شده و مقادیر زیر تنظیم شوند:

```dotenv
APP_NAME=Laravel
APP_ENV=production
APP_KEY= (در مرحله بعد اضافه می‌شود)
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_user
DB_PASSWORD=database_password
```

---

## ✅ ۵. راه‌اندازی دیتابیس و APP\_KEY

### 🔹 حالت اول: با دسترسی به SSH

1. از طریق SSH به هاست متصل شوید:

   ```bash
   ssh your_cpanel_user@your_domain.com
   ```
2. به دایرکتوری پروژه مراجعه شود:

   ```bash
   cd ~/laravel-project
   ```
3. دستورات artisan زیر اجرا شود:

   ```bash
   php artisan migrate --force
   php artisan db:seed --force   # در صورت وجود Seeder
   php artisan key:generate
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

---

### 🔹 حالت دوم: بدون دسترسی به SSH (phpMyAdmin)

#### ۵.۱. اجرای migration در محیط توسعه

1. در لوکال فایل `.env` تنظیم و این دستورات اجرا شوند:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

#### ۵.۲. خروجی گرفتن از دیتابیس

* در phpMyAdmin از دیتابیس لوکال خروجی SQL تهیه شود.
* یا با دستور زیر:

  ```bash
  mysqldump -u root -p database_name > dump.sql
  ```

#### ۵.۳. ایمپورت فایل SQL در هاست

1. وارد phpMyAdmin هاست شوید.
2. دیتابیس انتخاب شده و از تب **Import** فایل `dump.sql` بارگذاری شود.

#### ۵.۴. تنظیم APP\_KEY

1. در محیط توسعه دستور زیر اجرا شده و خروجی کپی شود:

   ```bash
   php artisan key:generate --show
   ```
2. مقدار خروجی در فایل `.env` هاست تنظیم شود:

   ```
   APP_KEY=base64:xxxxxxx
   ```

در این حالت نیازی به اجرای دستورات cache نیست و پروژه به صورت پیش‌فرض کار خواهد کرد.

---

## ✅ ۶. تنظیم دسترسی پوشه‌ها

دسترسی نوشتن برای پوشه‌های زیر از طریق File Manager به `755` یا `775` تغییر یابد:

* `storage/`
* `bootstrap/cache/`

---

## ✅ ۷. تنظیم دامنه و SSL (اختیاری)

از بخش **Domains → Addon Domains/Subdomains** دامنه به هاست متصل شود و در بخش **SSL/TLS** گواهینامه SSL (مانند Let's Encrypt) فعال گردد.

---

## ✅ ۸. پایان عملیات

سایت اکنون باید به درستی در دسترس باشد. در صورت بروز خطا:

* فایل لاگ‌ها در مسیر `storage/logs/laravel.log` بررسی شود.
* تنظیمات فایل `.env` بازبینی شود.
