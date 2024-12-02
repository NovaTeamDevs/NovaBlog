@extends('admin.layouts.master')
@section('title', 'افزودن توکن دسترسی - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">افزودن توکن دسترسی</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <form action="{{ route('admin.token.store') }}" method="post">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">توکن دسترسی جدید</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="user_id">کاربر</label>
                                        <select name="user_id" id="user_id" class="form-select" data-choices>
                                            <option value="user1">کاربر 1</option>
                                            <option value="user1">کاربر 2</option>
                                            <option value="user1">کاربر 3</option>
                                            <option value="user1">کاربر 4</option>
                                        </select>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>دسترسی ها</label>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="form-check me-4">
                                                <input class="form-check-input" type="radio" name="permission" id="read_permission" checked>
                                                <label class="form-check-label" for="read_permission">خواندن</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="permission" id="write_permission">
                                                <label class="form-check-label" for="write_permission">نوشتن</label>
                                            </div>
                                        </div>
                                        <span class="text-muted">دسترسی نوشتن شامل دسترسی خواندن هم می شود.</span>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">توضیحات</label>
                                        <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.token.index') }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-left me-2"></i>بازگشت</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save me-2"></i>ذخیره</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
