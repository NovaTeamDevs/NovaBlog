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
                <h3 class="mb-4">دسته‌بندی: {{ $category->name }}</h3>
                <div class="row">
                    @forelse($category->posts as $post)
                        <div class="col-md-4 mb-4">
                            @include('front.partials.post-item', ['post' => $post])
                        </div>
                    @empty
                        <p>مقاله ای یافت نشد!</p>
                    @endforelse
                </div>

                {{ $category->posts()->paginate(12)->links() }}

            </div>

        </div>
    </div>
    <!-- Main content end -->
@endsection
