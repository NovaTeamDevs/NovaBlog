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
                                    <a href="{{ route('admin.token.create') }}" class="btn btn-success">
                                        <i class="bi bi-plus"></i>
                                        افزودن
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($tokens->count() > 0)
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>کاربر</th>
                                                <th>نام توکن</th>
                                                <th>تاریخ ایجاد</th>
                                                <th>تاریخ آخرین استفاده</th>
                                                <th>تاریخ انقضاء</th>
                                                <th>دسترسی</th>
                                                <th style="width: 10%">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tokens as $token)
                                                <tr class="align-middle">
                                                    <td>{{ $token->tokenable->full_name }}</td>
                                                    <td>{{ $token->name }}</td>
                                                    <td>{{ is_null($token->created_at) ? '' : verta($token->created_at)->format('%d %B %Y - H:s:i') }}
                                                    </td>
                                                    <td>{{ is_null($token->expires_at) ? '' : verta($token->expires_at)->format('%d %B %Y - H:s:i') }}
                                                    </td>
                                                    <td>{{ is_null($token->last_used_at) ? '' : verta($token->last_used_at)->format('%d %B %Y - H:s:i') }}
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($token->abilities as $ability)
                                                                <li>{{ $ability }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger" data-bs-title="حذف"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            onclick="deleteItem(this)"
                                                            data-url="{{ route('admin.token.destroy', $token) }}"
                                                            data-title="توکن کاربر {{ $token->tokenable->full_name }}"
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
                                {{ $tokens->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
