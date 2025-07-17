@extends('front.layouts.master')
@section('title', 'نوا بلاگ');

@section('content')
    <!-- Main content start -->
    <div class="container my-5">
        <div class="row">

            <!-- سایدبار دسته‌بندی -->
            <div class="col-lg-3 order-lg-2">
                <div class="card mb-4">
                    <div class="card-header bg-light fw-bold">دسته‌بندی‌ها</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="category.html">دسته بندی اول</a>
                            <span class="badge bg-primary rounded-pill">10</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="category.html">دسته بندی دوم</a>
                            <span class="badge bg-primary rounded-pill">10</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="category.html">دسته بندی سوم</a>
                            <span class="badge bg-primary rounded-pill">10</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- محتوای اصلی -->
            <div class="col-lg-9 order-lg-1">
                <!-- فرم جستجو -->
                <div class="mb-5 p-5  rounded" style="background: url('{{ asset('assets/images/blog-banner.jpg') }}') center/cover;">
                    <h1 class="mb-3">به نوا بلاگ خوش آمدید</h1>
                    <form action="search.html" method="GET" class="d-flex justify-content-start">
                        <input type="text" class="form-control w-50 me-2" placeholder="دنبال چه چیزی می‌گردی؟">
                        <button type="submit" class="btn btn-light">جستجو</button>
                    </form>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-4">آخرین مقالات</h3>
                    <a href="#" class="btn btn-link">مشاهده همه</a>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="assets/img/post.jpg" class="card-img-top" alt="مقاله تستی">
                            <div class="card-body">
                                <h5 class="card-title">مقاله تستی</h5>
                                <p class="card-text text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت چاپ، و با استفاده از</p>
                                <a href="post-detail.html" class="btn btn-primary btn-sm">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="assets/img/post.jpg" class="card-img-top" alt="مقاله تستی">
                            <div class="card-body">
                                <h5 class="card-title">مقاله تستی</h5>
                                <p class="card-text text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت چاپ، و با استفاده از</p>
                                <a href="post-detail.html" class="btn btn-primary btn-sm">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="assets/img/post.jpg" class="card-img-top" alt="مقاله تستی">
                            <div class="card-body">
                                <h5 class="card-title">مقاله تستی</h5>
                                <p class="card-text text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت چاپ، و با استفاده از</p>
                                <a href="post-detail.html" class="btn btn-primary btn-sm">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="assets/img/post.jpg" class="card-img-top" alt="مقاله تستی">
                            <div class="card-body">
                                <h5 class="card-title">مقاله تستی</h5>
                                <p class="card-text text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت چاپ، و با استفاده از</p>
                                <a href="post-detail.html" class="btn btn-primary btn-sm">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="assets/img/post.jpg" class="card-img-top" alt="مقاله تستی">
                            <div class="card-body">
                                <h5 class="card-title">مقاله تستی</h5>
                                <p class="card-text text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت چاپ، و با استفاده از</p>
                                <a href="post-detail.html" class="btn btn-primary btn-sm">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="assets/img/post.jpg" class="card-img-top" alt="مقاله تستی">
                            <div class="card-body">
                                <h5 class="card-title">مقاله تستی</h5>
                                <p class="card-text text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت چاپ، و با استفاده از</p>
                                <a href="post-detail.html" class="btn btn-primary btn-sm">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Main content end -->
@endsection
