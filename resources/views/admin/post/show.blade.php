@use('App\Enum\PostStatusEnum')
@extends('admin.layouts.master')
@section('title', 'نمایش پست - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">نمایش پست</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">نمایش پست {{ $post->title }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-light">
                            <tbody>
                                <tr>
                                    <th style="width: 15%">عنوان</th>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">دسته بندی</th>
                                    <td>{{ $post->category->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">نویسنده</th>
                                    <td>{{ $post->author->full_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تاریخ ایجاد</th>
                                    <td>{{ verta($post->created_at)->format('%d %B %Y - H:s:i') }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تاریخ ویرایش</th>
                                    <td>{{ verta($post->updated_at)->format('%d %B %Y - H:s:i') }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">برچست ها</th>
                                    <td>{{ $post->tags }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تعداد لایک</th>
                                    <td>1000 تا لایک</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">وضعیت</th>
                                    <td id="status_badge">
                                        <span
                                            class="badge bg-{{ $post->status_color }} py-2 px-3">{{ $post->status_title }}</span>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <th style="width: 20%">تغییر وضعیت</th>
                                    <td>
                                        <div class="position-relative">
                                            <div class="d-flex align-items-center w-25" id="status_change">
                                                <select name="status" id="status" class="form-select me-3">
                                                    @foreach (PostStatusEnum::cases() as $status)
                                                        <option value="{{ $status->value }}" @selected(old('status') == $status->value)>
                                                            {{ __('app.post_status.' . $status->value) }}</option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-primary" type="button" onclick="changeStatus(this)"
                                                    data-token="{{ csrf_token() }}"
                                                    data-url="{{ route('admin.post.status', $post) }}">
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
                                <tr>
                                    <th style="width: 15%">تصویر</th>
                                    <td>
                                        <img src="{{ Storage::url($post->image) }}" alt="post image" class="rounded w-25">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">محتوا</th>
                                    <td>{{ $post->content }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-chevron-left me-2"></i>بازگشت
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
