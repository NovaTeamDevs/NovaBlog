@extends('front.layouts.master')
@section('title', 'نوا بلاگ - تماس با ما')

@section('content')
    <!-- Main content start -->
    <div class="container my-5">
        <div class="container my-5">
            <h2 class="mb-4">تماس با ما</h2>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label class="form-label">نام</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ایمیل</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">پیام</label>
                    <textarea name="message" rows="5" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">ارسال</button>
            </form>
        </div>
    </div>
    <!-- Main content end -->
@endsection
