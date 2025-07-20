@extends('front.layouts.master')
@section('title', 'نوا بلاگ - جستجو')

@section('content')
    <!-- Main content start -->
    <div class="container my-5">
        <h3 class="mb-4">نمایش نتایج جستجو برای: دسته بندی اول</h3>
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

        <!-- Pagination elements -->

    </div>
    <!-- Main content end -->
@endsection
