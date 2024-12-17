@extends('admin.layouts.master')
@section('title', 'دسته بندی ها - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">دسته بندی ها</h3>
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
                                <div class="card-tools">
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-success">
                                        <i class="bi bi-plus"></i>
                                        افزودن
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th>عنوان</th>
                                            <th>والد</th>
                                            <th style="width: 20%">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($categories->count() > 0)
                                            @foreach ($categories as $category)
                                                <tr class="align-middle">
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->parent_name }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.category.show', $category) }}"
                                                            class="btn btn-primary" data-bs-title="نمایش"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="bi bi-eye-fill text-white"></i></a>
                                                        <a href="{{ route('admin.category.edit', $category) }}"
                                                            class="btn btn-warning" data-bs-title="ویرایش"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="bi bi-pencil-fill text-white"></i></a>
                                                        <button type="button" class="btn btn-danger" data-bs-title="حذف"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            onclick="deleteItem(this)"
                                                            data-url="{{ route('admin.category.destroy', $category) }}"
                                                            data-title="" data-token="{{ csrf_token() }}"><i
                                                                class="bi bi-trash text-white"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p>موردی یافت نشد</p>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
