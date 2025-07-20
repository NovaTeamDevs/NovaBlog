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
                        @include('front.partials.post-item')
                    </div>
                    <div class="col-md-4 mb-4">
                        @include('front.partials.post-item')
                    </div>
                    <div class="col-md-4 mb-4">
                        @include('front.partials.post-item')
                    </div>
                    <div class="col-md-4 mb-4">
                        @include('front.partials.post-item')
                    </div>
                    <div class="col-md-4 mb-4">
                        @include('front.partials.post-item')
                    </div>
                    <div class="col-md-4 mb-4">
                        @include('front.partials.post-item')
                    </div>
                </div>
            </div>

            <!-- Pagination elements -->

        </div>
    </div>
    <!-- Main content end -->
@endsection
