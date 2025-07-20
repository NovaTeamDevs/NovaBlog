<div class="card mb-4">
    <div class="card-header bg-light fw-bold">دسته‌بندی‌ها</div>
    <ul class="list-group list-group-flush">
        @forelse($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                <span class="badge bg-primary rounded-pill">{{ $category->posts->count() }}</span>
            </li>
        @empty
            <p>اطلاعاتی یافت نشد!</p>
        @endforelse
    </ul>
</div>
