@extends('front.layouts.master')
@section('title', 'نوا بلاگ - مقاله تست')

@section('content')
    <!-- Main content start -->
    <div class="container my-5">
        <div class="row">

            <!-- سایدبار دسته‌بندی -->
            <div class="col-lg-3 order-lg-2">
                @include('front.partials.sidebar')
            </div>

            <!-- محتوای اصلی -->
            <div class="col-lg-9 order-lg-1">
                <div class="post-content card">
                    <img src="assets/img/post.jpg" class="card-img-top" style="max-height: 600px;" alt="مقاله تستی">
                    <div class="card-body">
                        <h1>مقاله تستی</h1>
                        <p class="text-muted">1404/04/25 | توسط <a href="author.html">مدیر سایت</a></p>

                        <div class="content">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                            فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                            کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می
                            طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و
                            فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری
                            موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی
                            دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                            گیرد.
                        </div>
                        <div class="mt-5">
                            <h6 class="mb-2 text-muted">برچسب‌ها:</h6>
                            <span
                                class="border border-primary text-sm text-primary rounded py-0 px-2 me-1">برچسب</span>
                            <span
                                class="border border-primary text-sm text-primary rounded py-0 px-2 me-1">برچسب</span>
                            <span
                                class="border border-primary text-sm text-primary rounded py-0 px-2 me-1">برچسب</span>
                            <span
                                class="border border-primary text-sm text-primary rounded py-0 px-2 me-1">برچسب</span>
                        </div>
                    </div>
                </div>

                <!-- Comment start -->
                <div class="comments mt-5">
                    <h4 class="mb-4">نظرات کاربران (1)</h4>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img src="assets/img/user-avatar.png" alt="avatar" width="40" height="40"
                                     class="rounded-circle me-2">
                                <div>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <strong>کاربر سایت</strong>
                                        <div class="text-muted small">1404/04/25</div>
                                    </div>
                                    <!-- هشدار تأیید نشدن -->
                                    <div class="alert alert-warning py-1 px-2 small">
                                        نظر شما در انتظار تایید مدیر است.
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2">نظر ثبت شده در سایت</p>
                            <button class="btn btn-sm btn-outline-secondary reply-btn"
                                    data-comment-id="1">پاسخ
                            </button>

                            <!-- نمایش پاسخ‌ها -->
                            <div class="card mt-3 ms-4 border-start border-2 border-primary">
                                <div class="card-body py-2 px-3">
                                    <div class="d-flex align-items-center mb-1">
                                        <img src="assets/img/user-avatar.png" alt="avatar" width="35" height="35"
                                             class="rounded-circle me-2">
                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                            <strong>مدیر وبسایت</strong>
                                            <div class="text-muted small">1404/04/25</div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-1">پاسخ نظر</p>
                                </div>
                            </div>

                            <!-- فرم پاسخ مخفی (با جاوااسکریپت نمایش داده میشه) -->
                            <form action="#" method="POST" class="reply-form mt-3 d-none" id="reply-form-1">
                                <input type="hidden" name="parent_id" value="1">
                                <div class="mb-2">
                                        <textarea name="body" rows="2" class="form-control"
                                                  placeholder="پاسخ خود را بنویسید..." required></textarea>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-sm btn-primary">ارسال پاسخ</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger cancel-reply"
                                            data-comment-id="1">لغو
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- فرم ارسال نظر اصلی -->
                <div class="card mt-5">
                    <div class="card-header">ارسال نظر جدید</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="mb-3">
                                    <textarea name="body" rows="4" class="form-control"
                                              placeholder="نظر خود را بنویسید..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">ارسال نظر</button>
                        </form>
                    </div>
                </div>
                <!-- Comment end -->
            </div>
        </div>
    </div>
    <!-- Main content end -->
@endsection

@push('scripts')
    <script>
        // نمایش فرم پاسخ
        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.commentId;

                // پنهان کردن سایر فرم‌ها
                document.querySelectorAll('.reply-form').forEach(form => form.classList.add('d-none'));

                // نمایش فرم مربوط به این نظر
                document.getElementById('reply-form-' + id).classList.remove('d-none');
            });
        });

        // لغو پاسخ
        document.querySelectorAll('.cancel-reply').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.commentId;
                document.getElementById('reply-form-' + id).classList.add('d-none');
            });
        });
    </script>
@endpush
