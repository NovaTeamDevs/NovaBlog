@extends('admin.layouts.master')
@section('title', 'پست ها - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">پست ها</h3>
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
                                <div class="card-tools d-flex align-items-center">
                                    <form action="{{ route('admin.post.index') }}" method="get">
                                        <div class="input-group">
                                            <span class="input-group-text">جستجو : </span>
                                            <input type="search" class="form-control" placeholder="جستجو ..."
                                                name="search" value="{{ request()->search }}">
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                    <a href="{{ route('admin.post.create') }}" class="btn btn-success ms-3">
                                        <i class="bi bi-plus"></i>
                                        افزودن
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($posts->count() > 0)
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">#</th>
                                                <th style="width: 10%">تصویر</th>
                                                <th>عنوان</th>
                                                <th>دسته بندی</th>
                                                <th>نویسنده</th>
                                                <th>وضعیت</th>
                                                <th style="width: 20%">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr class="align-middle">
                                                    <td>{{ $post->id }}</td>
                                                    <td>
                                                        <img src="{{ Storage::url($post->image) }}" alt="post image"
                                                            class="w-100 rounded">
                                                    </td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->category->name }}</td>
                                                    <td>{{ $post->author->full_name }}</td>
                                                    <td>
                                                        <span
                                                            class="badge text-bg-{{ $post->status_color }}">{{ $post->status_title }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.post.show', $post) }}"
                                                            class="btn btn-primary" data-bs-title="نمایش"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="bi bi-eye-fill text-white"></i></a>
                                                        <a href="{{ route('admin.post.edit', $post) }}"
                                                            class="btn btn-warning" data-bs-title="ویرایش"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="bi bi-pencil-fill text-white"></i></a>
                                                        <button type="button" class="btn btn-danger" data-bs-title="حذف"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            onclick="deleteItem(this)"
                                                            data-url="{{ route('admin.post.destroy', $post) }}"
                                                            data-title="" data-token="{{ csrf_token() }}"><i
                                                                class="bi bi-trash text-white"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>دیتایی یافت نشد!</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
