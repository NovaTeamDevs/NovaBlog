@extends('front.layouts.master')
@section('title', $pageTitle)

@use('App\Enum\CommentStatusEnum')

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
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="max-height: 600px;" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h1>{{ $post->title }}</h1>
                        <p class="text-muted">{{ verta($post->created_at)->format('Y/m/d') }} | توسط <a href="{{ route('author', $post->author->id) }}">{{ $post->author->full_name }}</a></p>

                        <div class="content">{!! $post->content !!}</div>
                        <div class="mt-5">
                            <h6 class="mb-2 text-muted">برچسب‌ها:</h6>
                            @php $tags = explode(',', $post->tags); @endphp
                            @foreach($tags as $tag)
                                @php $tag = trim($tag) @endphp
                                <span class="border border-primary text-sm text-primary rounded py-0 px-2 me-1">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Comment start -->
                <div class="comments mt-5">
                    <h4 class="mb-4">نظرات کاربران ({{ $post->comments->count() }})</h4>

                    <div class="card mb-3">
                        <div class="card-body">
                            @foreach($post->comments as $comment)
                                @php if(!is_null($comment->parent_id)) continue; @endphp
                                @php if($comment->isRejectedOrPendingCommentForUser()) continue; @endphp
                                <div class="mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{ $comment->user->user_avatar }}" alt="avatar" width="40" height="40"
                                             class="rounded-circle me-2">
                                        <div class="">
                                            <div class="d-flex justify-content-start align-items-center gap-2">
                                                <strong>{{ $comment->user->full_name }}</strong>
                                                <div class="text-muted small">{{ verta($comment->created_at)->format('Y/m/d') }}</div>
                                            </div>
                                            @if($comment->isPendingComment())
                                                <!-- هشدار تأیید نشدن -->
                                                <div class="alert alert-warning py-1 px-2 small">
                                                    نظر شما در انتظار تایید مدیر است.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="mb-2">{{ $comment->comment }}</p>
                                    @unless($comment->isPendingComment())
                                        <button
                                            class="btn btn-sm btn-outline-secondary reply-btn"
                                            data-comment-id="{{ $comment->id }}"
                                        >پاسخ</button>
                                    @endunless

                                    <!-- نمایش پاسخ‌ها -->
                                    @foreach($comment->answer as $answer)
                                        @php if($answer->isRejectedOrPendingCommentForUser()) continue; @endphp
                                        <div class="card mt-3 ms-4 border-start border-2 border-primary">
                                            <div class="card-body py-2 px-3">
                                                <div class="d-flex align-items-center mb-1">
                                                    <img src="{{ $answer->user->user_avatar }}" alt="avatar" width="35" height="35"
                                                         class="rounded-circle me-2">
                                                    <div class="">
                                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                                            <strong>{{ $answer->user->full_name }}</strong>
                                                            <div class="text-muted small">{{ verta($answer->created_at)->format('Y/m/d') }}</div>
                                                        </div>
                                                        @if($answer->isPendingComment())
                                                            <!-- هشدار تأیید نشدن -->
                                                            <div class="alert alert-warning py-1 px-2 small">
                                                                پاسخ شما در انتظار تایید مدیر است.
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <p class="mt-3 mb-1">{{ $answer->comment }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- فرم پاسخ مخفی (با جاوااسکریپت نمایش داده میشه) -->
                                    <form action="{{ route('comment.store') }}" method="POST" class="reply-form mt-3 d-none" id="reply-form-{{ $comment->id }}">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="mb-2">
                                        <textarea
                                            name="comment"
                                            rows="2"
                                            class="form-control"
                                            placeholder="پاسخ خود را بنویسید..." required></textarea>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button type="submit" class="btn btn-sm btn-primary">ارسال پاسخ</button>
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-danger cancel-reply"
                                                    data-comment-id="{{ $comment->id }}">لغو
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- فرم ارسال نظر اصلی -->
                <div class="card mt-5">
                    <div class="card-header">ارسال نظر جدید</div>
                    <div class="card-body">
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="mb-3">
                                <textarea
                                    name="comment"
                                    rows="4"
                                    class="form-control"
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
