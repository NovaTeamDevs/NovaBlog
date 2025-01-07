@extends('admin.layouts.master')
@section('title', 'ویرایش کاربر - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">ویرایش کاربر</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <form action="{{ route('admin.user.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">ویرایش کاربر</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="first_name">نام</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control"
                                            value="{{ old('first_name', $user->first_name) }}">
                                        @error('first_name')
                                            <div class="text-danger">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="last_name">نام خانوادگی</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control"
                                            value="{{ old('last_name', $user->last_name) }}">
                                        @error('last_name')
                                            <div class="text-danger">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="email">ایمیل</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <div class="text-danger">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="form-group">
                                        <label for="password">کلمه عبور</label>
                                        <div class="input-group">
                                            <input type="querySelector" id="password" name="password" class="form-control">
                                            <button class="btn btn-outline-secondary btn-gen-passw" type="button"
                                                data-bs-title="ساخت رمز عبور قوی" data-bs-toggle="tooltip"
                                                data-bs-placement="top">
                                                <i class="bi bi-key"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <div class="text-danger">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="is_admin">مدیر است ؟</label>
                                        <div class="form-check">
                                            <input type="hidden" name="is_admin" value="0">
                                            <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin"
                                                @checked(old('is_admin', $user->is_admin)) value="1">
                                            <label class="form-check-label" for="is_admin">بله مدیر است</label>
                                        </div>
                                        @error('is_admin')
                                            <div class="text-danger">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="form-group">
                                        <label for="avatar">آواتار</label>
                                        <input type="file" name="avatar" id="avatar" class="form-control"
                                            accept="image/jpeg,image/png">
                                        @error('avatar')
                                            <div class="text-danger">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    @if (!empty($user->avatar))
                                        <div class="p-2">
                                            <img src="{{ Storage::url($user->avatar) }}" width="150" heigth="auto" />
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-chevron-left me-2"></i>بازگشت</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save me-2"></i>ذخیره</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
