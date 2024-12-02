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
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <span class="text-muted">برای تغییر وضعیت نظر وارد نظر شوید.</span>
                            </div>
                            <div class="card-body">
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
                                        <tr class="align-middle">
                                            <td>1.</td>
                                            <td>پست شماره 1</td>
                                            <td>کاربر شماره 1</td>
                                            <td>نظر اصلی</td>
                                            <td>
                                                <span class="badge bg-success">تائید شده</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-bs-title="نمایش" data-bs-toggle="tooltip" data-bs-placement="top"><i class="bi bi-eye-fill text-white"></i></a>
                                                <button type="button" class="btn btn-danger" data-bs-title="حذف" data-bs-toggle="tooltip" data-bs-placement="top" onclick="deleteItem(this)" data-url="#" data-title="" data-token="{{ csrf_token() }}"><i class="bi bi-trash text-white"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>2.</td>
                                            <td>پست شماره 2</td>
                                            <td>user@email.com</td>
                                            <td>پاسخ به نظر شماره 1</td>
                                            <td>
                                                <span class="badge bg-warning">در انتظار</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-bs-title="نمایش" data-bs-toggle="tooltip" data-bs-placement="top"><i class="bi bi-eye-fill text-white"></i></a>
                                                <button type="button" class="btn btn-danger" data-bs-title="حذف" data-bs-toggle="tooltip" data-bs-placement="top" onclick="deleteItem(this)" data-url="#" data-title="" data-token="{{ csrf_token() }}"><i class="bi bi-trash text-white"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>3.</td>
                                            <td>پست شماره 3</td>
                                            <td>کاربر شماره 5</td>
                                            <td>نظر اصلی</td>
                                            <td>
                                                <span class="badge bg-danger">رد شده</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-bs-title="نمایش" data-bs-toggle="tooltip" data-bs-placement="top"><i class="bi bi-eye-fill text-white"></i></a>
                                                <button type="button" class="btn btn-danger" data-bs-title="حذف" data-bs-toggle="tooltip" data-bs-placement="top" onclick="deleteItem(this)" data-url="#" data-title="" data-token="{{ csrf_token() }}"><i class="bi bi-trash text-white"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <ul class="pagination float-end">
                                    <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
