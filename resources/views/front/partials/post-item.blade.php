<div class="card h-100">
    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text text-muted">{{ Str::limit($post->content, 15) }}</p>
        <a href="{{ route('post', $post->slug) }}" class="btn btn-primary btn-sm">ادامه مطلب</a>
    </div>
</div>
