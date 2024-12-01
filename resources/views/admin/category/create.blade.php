@extends('admin.layouts.master')
@section('title', 'افزودن دسته بندی - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">افزودن دسته بندی</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">دسته بندی جدید</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">عنوان</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="parent_id">والد</label>
                                        <select name="parent_id" id="parent_id" class="form-select" data-choices data-selecttext="کلیک برای انتخاب">
                                            <option value="">انتخاب دسته بندی والد</option>
                                            <option value="1">test1</option>
                                            <option value="2">test2</option>
                                        </select>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">توضیحات</label>
                                        <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
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
