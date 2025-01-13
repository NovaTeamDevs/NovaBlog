@use('App\Enum\CommentStatusEnum')
@extends('admin.layouts.master')
@section('title', 'مشاهده نظر - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">مشاهده نظر</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-4">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <table class="table table-bordered table-light">
                                    <tbody>
                                        <tr class="align-middle">
                                            <th style="width: 20%">شماره نظر</th>
                                            <td>{{ $comment->id }}</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">پست</th>
                                            <td>{{ $comment->post->title }}</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">نویسنده</th>
                                            <td>{{ $comment->comment_user_name }}</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">ایمیل</th>
                                            <td>{{ $comment->comment_user_email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-12">
                                <table class="table table-bordered table-light">
                                    <tbody>
                                        <tr class="align-middle">
                                            <th style="width: 20%">تاریخ ارسال</th>
                                            <td>{{ verta($comment->created_at)->format('%d %B %Y - H:s:i') }}</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">تاریخ آخرین پاسخ</th>
                                            <td>{{ verta($comment->last_answer_date)->format('%d %B %Y - H:s:i') }}
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">وضعیت</th>
                                            <td id="status_badge">
                                                <span
                                                    class="badge bg-{{ $comment->status_color }}">{{ $comment->status_title }}</span>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">تغییر وضعیت</th>
                                            <td>
                                                <div class="position-relative">
                                                    <div class="d-flex align-items-center w-25" id="status_change">
                                                        <select name="status" id="status" class="form-select me-3">
                                                            @foreach (CommentStatusEnum::cases() as $status)
                                                                <option value="{{ $status->value }}"
                                                                    @selected(old('status', $comment->status->value) == $status->value)>
                                                                    {{ __('app.comment_status.' . $status->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        <button class="btn btn-primary" type="button"
                                                            onclick="changeStatus(this)" data-token="{{ csrf_token() }}"
                                                            data-url="{{ route('admin.comment.status', $comment) }}">
                                                            <i class="bi bi-arrow-clockwise"></i>
                                                        </button>
                                                    </div>
                                                    <div class="position-absolute d-none" style="top: 10%; right: 10%;"
                                                        id="status_spinner">
                                                        <div class="spinner-border text-primary" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <div class="border rounded p-4">
                                    <h5 class="fw-bold">متن نظر :</h5>
                                    <p class="m-0">{{ $comment->comment }}</p>

                                    @if ($comment->answer->isNotEmpty())
                                        <div class="border rounded  mt-5 p-3">
                                            <h5 class="fw-bold">پاسخ ها :</h5>
                                            @foreach ($comment->answer as $answer)
                                                <div class="border rounded p-2 mb-1">
                                                    <span class="text-muted">
                                                        پاسخ شماره : {{ $answer->id }} - تاریخ پاسخ :
                                                        {{ verta($answer->created_at)->format('%d %B %Y - H:s:i') }} - توسط
                                                        :
                                                        {{ $answer->comment_user_name }}</span>
                                                    <hr>
                                                    <p class="m-0">{{ $answer->comment }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.comment.answer', $comment) }}" method="post">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">پاسخ دهی به نظر</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea name="content" id="content" cols="5" rows="10" class="form-control">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.comment.index') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-chevron-left me-2"></i>بازگشت</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save me-2"></i>ذخیره
                                پاسخ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
