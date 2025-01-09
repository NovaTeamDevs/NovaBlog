@extends('admin.layouts.master')
@section('title', 'نظرات - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">نظرات</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @include('admin.layouts.alerts')
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <span class="text-muted">برای تغییر وضعیت نظر وارد نظر شوید.</span>
                            </div>
                            <div class="card-body">
                                @if ($comments->isNotEmpty())
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">#</th>
                                                <th>پست</th>
                                                <th>نویسنده</th>
                                                <th>نوع</th>
                                                <th style="width: 10%">وضعیت</th>
                                                <th style="width: 20%">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comments as $comment)
                                                <tr class="align-middle">
                                                    <td>{{ $comment->id }}</td>
                                                    <td>{{ $comment->post->title }}</td>
                                                    <td>{{ $comment->comment_user_name }}</td>
                                                    <td>{{ $comment->getParentName() }}</td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $comment->status_color }}">{{ $comment->status_title }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.comment.show', $comment) }}"
                                                            class="btn btn-primary" data-bs-title="نمایش"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="bi bi-eye-fill text-white"></i></a>
                                                        <button type="button" class="btn btn-danger" data-bs-title="حذف"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            onclick="deleteItem(this)"
                                                            data-url="{{ route('admin.comment.destroy', $comment) }}"
                                                            data-title="نظر شماره {{ $comment->id }}"
                                                            data-token="{{ csrf_token() }}"><i
                                                                class="bi bi-trash text-white"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>موردی یافت نشد!</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                {{ $comments->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
