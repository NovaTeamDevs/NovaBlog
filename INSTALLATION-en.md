# 🌍 Laravel Deployment Guide on cPanel Linux Hosting

This guide explains how to deploy a Laravel project on a Linux hosting with **cPanel**, covering both **with SSH access** and **without SSH access (phpMyAdmin only)** scenarios.

---

## ✅ 1. Prepare the Hosting Environment

1. Log into cPanel.
2. Check PHP version in **Select PHP Version** or **MultiPHP Manager**. Minimum required is **PHP 8.1+**.
3. Enable the following PHP extensions:

   * `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `tokenizer`, `curl`, `xml`, `ctype`, `json`, `bcmath`

---

## ✅ 2. Prepare & Upload the Project

1. On local development machine, run:

   ```bash
   composer install --no-dev --optimize-autoloader
   ```
2. Include the `vendor/` directory in the project.
3. ZIP the project, upload it to the hosting using File Manager, and extract it.

---

## ✅ 3. Configure public\_html Directory

1. Move the contents of the `public/` folder to `public_html/`.
2. Edit `public_html/index.php` and adjust the paths:

```php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
```

If the Laravel project is in a directory like `laravel-project`, update as follows:

```php
require __DIR__.'/../laravel-project/vendor/autoload.php';
$app = require_once __DIR__.'/../laravel-project/bootstrap/app.php';
```

---

## ✅ 4. Configure the .env File

Edit the `.env` file with these settings:

```dotenv
APP_NAME=Laravel
APP_ENV=production
APP_KEY= (will be added later)
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

## ✅ 5. Setup Database and APP\_KEY

### 🔹 Option 1: With SSH Access

1. Connect via SSH:

   ```bash
   ssh your_cpanel_user@your_domain.com
   ```
2. Go to the project directory:

   ```bash
   cd ~/laravel-project
   ```
3. Run the artisan commands:

   ```bash
   php artisan migrate --force
   php artisan db:seed --force   # if applicable
   php artisan key:generate
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

---

### 🔹 Option 2: Without SSH (phpMyAdmin)

#### 5.1. Run migrations locally

Run on your local environment:

```bash
php artisan migrate
php artisan db:seed
```

#### 5.2. Export the database

* Export the SQL file using phpMyAdmin.
* Or use mysqldump:

  ```bash
  mysqldump -u root -p database_name > dump.sql
  ```

#### 5.3. Import the SQL file to the hosting database

1. Open phpMyAdmin on the hosting.
2. Select the database and import the `dump.sql` file from the **Import** tab.

#### 5.4. Set APP\_KEY

1. Generate the key locally:

   ```bash
   php artisan key:generate --show
   ```
2. Copy and paste the generated key in the `.env` file:

   ```
   APP_KEY=base64:xxxxxxx
   ```

Artisan cache commands can be skipped in this case; Laravel will still work normally.

---

## ✅ 6. Set Folder Permissions

Set writable permissions (`755` or `775`) for these directories via File Manager:

* `storage/`
* `bootstrap/cache/`

---

## ✅ 7. Configure Domain and SSL (Optional)

Connect the domain using **Domains → Addon Domains/Subdomains** and activate SSL certificates from **SSL/TLS** (e.g., Let's Encrypt).

---

## ✅ 8. Deployment Complete

The site should now be live.
If any errors occur:

* Check logs in `storage/logs/laravel.log`.
* Review the `.env` file settings.
