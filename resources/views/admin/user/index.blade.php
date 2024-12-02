@extends('admin.layouts.master')
@section('title', 'کاربران - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">کاربران</h3>
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
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-success">
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
                                            <th style="width: 5%">آواتار</th>
                                            <th>نام کامل</th>
                                            <th>ایمیل</th>
                                            <th>تاریخ تائید ایمیل</th>
                                            <th>مدیر است؟</th>
                                            <th style="width: 20%">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle">
                                            <td>1.</td>
                                            <td>
                                                <img src="{{ asset('assets/images/avatar-1.jpg') }}" alt="avatar image" class="w-100 rounded-circle">
                                            </td>
                                            <td>کاربر شماره 1</td>
                                            <td>user1@email.com</td>
                                            <td><span class="badge bg-success">تایید شده</span></td>
                                            <td><i class="bi bi-check text-success fs-1"></i></td>
                                            <td>
                                                <a href="#" class="btn btn-primary"><i class="bi bi-eye-fill text-white"></i></a>
                                                <a href="#" class="btn btn-warning"><i class="bi bi-pencil-fill text-white"></i></a>
                                                <button type="button" class="btn btn-danger" onclick="deleteItem(this)" data-url="#" data-title="" data-token="{{ csrf_token() }}"><i class="bi bi-trash text-white"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>2.</td>
                                            <td>
                                                <img src="{{ asset('assets/images/avatar-2.jpg') }}" alt="avatar image" class="w-100 rounded-circle">
                                            </td>
                                            <td>کاربر شماره 2</td>
                                            <td>user2@email.com</td>
                                            <td><span class="badge bg-warning">در انتظار</span></td>
                                            <td><i class="bi bi-x text-danger fs-1"></i></td>
                                            <td>
                                                <a href="#" class="btn btn-primary"><i class="bi bi-eye-fill text-white"></i></a>
                                                <a href="#" class="btn btn-warning"><i class="bi bi-pencil-fill text-white"></i></a>
                                                <button type="button" class="btn btn-danger" onclick="deleteItem(this)" data-url="#" data-title="" data-token="{{ csrf_token() }}"><i class="bi bi-trash text-white"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>3.</td>
                                            <td>
                                                <img src="{{ asset('assets/images/avatar-3.jpg') }}" alt="avatar image" class="w-100 rounded-circle">
                                            </td>
                                            <td>کاربر شماره 3</td>
                                            <td>user3@email.com</td>
                                            <td><span class="badge bg-success">تایید شده</span></td>
                                            <td><i class="bi bi-x text-danger fs-1"></i></td>
                                            <td>
                                                <a href="#" class="btn btn-primary"><i class="bi bi-eye-fill text-white"></i></a>
                                                <a href="#" class="btn btn-warning"><i class="bi bi-pencil-fill text-white"></i></a>
                                                <button type="button" class="btn btn-danger" onclick="deleteItem(this)" data-url="#" data-title="" data-token="{{ csrf_token() }}"><i class="bi bi-trash text-white"></i></button>
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
