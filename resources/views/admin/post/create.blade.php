@extends('admin.layouts.master')
@section('title', 'افزودن پست - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">افزودن پست</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <form action="{{ route('admin.post.store') }}" method="post">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">پست جدید</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="title">عنوان</label>
                                        <input type="text" id="title" name="title" class="form-control">
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="tags">برچست ها</label>
                                        <input type="text" id="tags" name="tags" class="form-control" data-taggable>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="category_id">دسته بندی</label>
                                        <select name="category_id" id="category_id" class="form-select" data-choices data-selecttext="کلیک برای انتخاب">
                                            <option value="">انتخاب دسته بندی</option>
                                            <option value="1">test1</option>
                                            <option value="2">test2</option>
                                        </select>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="user_id">نویسنده</label>
                                        <select name="user_id" id="user_id" class="form-select" data-choices data-selecttext="کلیک برای انتخاب">
                                            <option value="1">سعید نوری</option>
                                            <option value="2">ادمین 2</option>
                                            <option value="3">ادمین 3</option>
                                        </select>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="status">وضعیت</label>
                                        <select name="status" id="status" class="form-select" data-choices data-selecttext="کلیک برای انتخاب">
                                            <option value="1">منتشر شده</option>
                                            <option value="2">در انتظار</option>
                                            <option value="3">منتشر نشده</option>
                                        </select>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="image">تصویر</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/jpeg,image/png">
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="content">محتوا</label>
                                        <textarea name="content" id="content" cols="5" rows="15" class="form-control"></textarea>
                                        <div class="text-danger"><p>محتوای خطا</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-left me-2"></i>بازگشت</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save me-2"></i>ذخیره</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
