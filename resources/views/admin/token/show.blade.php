@extends('admin.layouts.master')
@section('title', 'نمایش اطلاعات توکن - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">نمایش اطلاعات توکن</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">نمایش اطلاعات توکن</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-light">
                            <tbody>
                                <tr>
                                    <th style="width: 15%">توکن</th>
                                    <td><code>{{ $plainTextToken }}</code></td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">نام توکن</th>
                                    <td>{{ $token->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تاریخ ایجاد</th>
                                    <td>{{ is_null($token->created_at) ? '' : verta($token->created_at)->format('%d %B %Y - H:s:i') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">کاربر</th>
                                    <td>{{ $token->tokenable->full_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">دسترسی ها</th>
                                    <td>
                                        <ul>
                                            @foreach ($token->abilities as $ability)
                                                <li>{{ $ability }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.token.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-chevron-left me-2"></i>بازگشت
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
