@extends('front.layouts.master')
@section('title', 'نوا بلاگ - آرشیو مقالات')

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
                <div class="row">
                    <div class="col-md-4 mb-4">
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
                    <div class="col-md-4 mb-4">
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
                    <div class="col-md-4 mb-4">
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
                    <div class="col-md-4 mb-4">
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

            <!-- Pagination elements -->

        </div>
    </div>
    <!-- Main content end -->
@endsection
