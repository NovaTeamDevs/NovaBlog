@extends('admin.layouts.master')
@section('title', 'افزودن کاربر - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">افزودن کاربر</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">کاربر جدید</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="first_name">نام</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control">
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="last_name">نام خانوادگی</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control">
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="email">ایمیل</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="form-group">
                                        <label for="password">کلمه عبور</label>
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control">
                                            <button class="btn btn-outline-secondary" type="button" data-bs-title="ساخت رمز عبور قوی" data-bs-toggle="tooltip" data-bs-placement="top">
                                                <i class="bi bi-key"></i>
                                            </button>
                                        </div>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="is_admin">مدیر است ؟</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_admin">
                                            <label class="form-check-label" for="is_admin">بله مدیر است</label>
                                        </div>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="form-group">
                                        <label for="avatar">آواتار</label>
                                        <input type="file" name="avatar" id="avatar" class="form-control" accept="image/jpeg,image/png">
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-left me-2"></i>بازگشت</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save me-2"></i>ذخیره</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
