@extends('admin.layouts.master')
@section('title', 'توکن های دسترسی - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">توکن های دسترسی</h3>
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
                                <div class="card-tools">
                                    <a href="{{ route('admin.token.create') }}" class="btn btn-success">
                                        <i class="bi bi-plus"></i>
                                        افزودن
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%">توکن</th>
                                            <th>کاربر</th>
                                            <th>دسترسی</th>
                                            <th>توضیحات</th>
                                            <th style="width: 10%">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle">
                                            <td><code>shgjk34hkndfvkn2398yxcvy9df</code></td>
                                            <td>کاربر شماره 1</td>
                                            <td>خواندن - نوشتن</td>
                                            <td>توضیحات ندارد</td>
                                            <td>
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
