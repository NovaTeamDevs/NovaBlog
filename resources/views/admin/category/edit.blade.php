@extends('admin.layouts.master')
@section('title', 'ویرایش دسته بندی - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">ویرایش دسته بندی</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <form action="{{ route('admin.category.update', $category) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">ویرایش دسته بندی</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">عنوان</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" class="form-control">
                                        @error('name') <div class="text-danger"><p>{{ $message }}</p></div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="parent_id">دسته بندی والد</label>
                                        <select name="parent_id" id="parent_id" class="form-select" data-choices data-selecttext="کلیک برای انتخاب">
                                            <option value="">انتخاب دسته بندی والد</option>
                                            @foreach($categories as $parent)
                                                <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) == $parent->id)>{{ $parent->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('parent_id') <div class="text-danger"><p>{{ $message }}</p></div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">توضیحات</label>
                                        <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ old('description', $category->description) }}</textarea>
                                        @error('description') <div class="text-danger"><p>{{ $message }}</p></div> @enderror
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
