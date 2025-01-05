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
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-success">
                                        <i class="bi bi-plus"></i>
                                        افزودن
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($users->count() > 0)
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
                                            @foreach ($users as $user)
                                                <tr class="align-middle">
                                                    <td>{{ $user->id }}</td>
                                                    <td>
                                                        <img src="{{ $user->avatar }}" alt="avatar image"
                                                            class="w-100 rounded-circle">
                                                    </td>
                                                    <td>{{ $user->full_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->hasVerifiedEmail())
                                                            <span class="badge bg-success">تایید شده</span>
                                                        @else
                                                            <span class="badge bg-danger">تایید نشده</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($user->is_admin)
                                                            <i class="bi bi-check text-success fs-1"></i>
                                                        @else
                                                            <i class="bi bi-times text-danger fs-1"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.user.edit', $user) }}"
                                                            class="btn btn-warning" data-bs-title="ویرایش"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="bi bi-pencil-fill text-white"></i></a>
                                                        <button type="button" class="btn btn-danger" data-bs-title="حذف"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            onclick="deleteItem(this)"
                                                            data-url="{{ route('admin.user.destroy', $user) }}"
                                                            data-title="{{ $user->full_name }}"
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
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
