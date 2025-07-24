@extends('front.layouts.master')
@section('title', $pageTitle)

@section('content')
    <!-- Main content start -->
    <div class="container my-5">
        <h3 class="mb-4">نمایش نتایج جستجو برای: {{ request()->get('q') }}</h3>
        <div class="row">
            @forelse($posts as $post)
                <div class="col-md-4 mb-4">
                    @include('front.partials.post-item', ['post' => $post])
                </div>
            @empty
                <p>مقاله ای یافت نشد!</p>
            @endforelse
        </div>

        {{ $posts->links() }}

    </div>
    <!-- Main content end -->
@endsection
