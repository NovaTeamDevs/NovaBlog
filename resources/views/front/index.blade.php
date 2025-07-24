@extends('front.layouts.master')
@section('title', $pageTitle)

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
                <!-- فرم جستجو -->
                <div class="mb-5 p-5  rounded"
                     style="background: url('{{ asset('assets/images/blog-banner.jpg') }}') center/cover;">
                    <h1 class="mb-3">به نوا بلاگ خوش آمدید</h1>
                    <form action="{{ route('search') }}" method="GET" class="d-flex justify-content-start">
                        <input type="text" class="form-control w-50 me-2" placeholder="دنبال چه چیزی می‌گردی؟"
                               value="{{ request()->get('q') }}" name="q">
                        <button type="submit" class="btn btn-light">جستجو</button>
                    </form>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-4">آخرین مقالات</h3>
                    <a href="{{ route('archive') }}" class="btn btn-link">مشاهده همه</a>
                </div>
                <div class="row">
                    @forelse($posts as $post)
                        <div class="col-md-6 mb-4">
                            @include('front.partials.post-item', ['post' => $post])
                        </div>
                    @empty
                        <p>مقاله ای یافت نشد!</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
    <!-- Main content end -->
@endsection
