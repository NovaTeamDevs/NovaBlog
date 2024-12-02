@extends('admin.layouts.master')
@section('title', 'نمایش کاربر - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">نمایش کاربر</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">کاربر شماره ؟؟؟</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-light">
                            <tbody>
                                <tr>
                                    <th style="width: 15%">آواتار</th>
                                    <td>
                                        <img src="{{ asset('assets/images/avatar-1.jpg') }}" alt="avatar image" width="80" class="rounded-circle">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">نام</th>
                                    <td>کاربر</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">نام خانوادگی</th>
                                    <td>شماره 1</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">ایمیل</th>
                                    <td>user1@email.com</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">وضعیت تایید ایمیل</th>
                                    <td>
                                        <span class="badge bg-success">تایید شده</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">مدیر است؟</th>
                                    <td><i class="bi bi-check text-success fs-1"></i></td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تاریخ عضویت</th>
                                    <td>همین امروز</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تعداد مقالات</th>
                                    <td>20 مقاله</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تعداد نظرات</th>
                                    <td>100 نظر</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-chevron-left me-2"></i>بازگشت
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
