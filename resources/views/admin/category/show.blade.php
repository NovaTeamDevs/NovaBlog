@extends('admin.layouts.master')
@section('title', 'نمایش دسته بندی - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">نمایش دسته بندی</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">نمایش دسته بندی {{ $category->name }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-light">
                            <tbody>
                                <tr>
                                    <th style="width: 15%">عنوان</th>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">دسته بندی والد</th>
                                    <td>{{ $category->parent_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">توضیحات</th>
                                    <td>{{ $category->description }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تاریخ ایجاد</th>
                                    <td>{{ verta($category->created_at)->format('%d %B %Y - H:s:i') }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تاریخ ویرایش</th>
                                    <td>{{ verta($category->updated_at)->format('%d %B %Y - H:s:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-chevron-left me-2"></i>بازگشت
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
