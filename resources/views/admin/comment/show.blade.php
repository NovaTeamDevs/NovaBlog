@extends('admin.layouts.master')
@section('title', 'مشاهده نظر - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">مشاهده نظر</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-4">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <table class="table table-bordered table-light">
                                    <tbody>
                                        <tr class="align-middle">
                                            <th style="width: 20%">شماره نظر</th>
                                            <td>32</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">پست</th>
                                            <td>پست شماره 2</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">نویسنده</th>
                                            <td>کاربر شماره 1</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">ایمیل</th>
                                            <td>user@email.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-12">
                                <table class="table table-bordered table-light">
                                    <tbody>
                                        <tr class="align-middle">
                                            <th style="width: 20%">وضعیت</th>
                                            <td>
                                                <span class="badge bg-warning">در انتظار</span>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">تاریخ ارسال</th>
                                            <td>همین امروز</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">تاریخ آخرین پاسخ</th>
                                            <td>همین امروز</td>
                                        </tr>
                                        <tr class="align-middle">
                                            <th style="width: 20%">تغییر وضعیت</th>
                                            <td>
                                                <div class="position-relative">
                                                    <div class="d-flex align-items-center" id="status_change">
                                                        <select name="status" id="status" class="form-select me-3">
                                                            <option value="0">در انتظار</option>
                                                            <option value="1">تائید شده</option>
                                                            <option value="2">رد شده</option>
                                                        </select>
                                                        <button class="btn btn-primary" type="button"><i class="bi bi-arrow-clockwise"></i></button>
                                                    </div>
                                                    <div class="position-absolute" style="top: 10%; right: 50%;" id="status_spinner">
                                                        <div class="spinner-border text-primary" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <div class="border rounded p-4">
                                    <h5 class="fw-bold">متن نظر :</h5>
                                    <p class="m-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>

                                    <div class="border rounded  mt-5 p-3">
                                        <h5 class="fw-bold">پاسخ ها :</h5>
                                        <div class="border rounded p-2 mb-1">
                                            <span class="text-muted">پاسخ شماره : 2 - تاریخ پاسخ : همین امروز - توسط : ادمین سایت</span>
                                            <hr>
                                            <p class="m-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                                        </div>
                                        <div class="border rounded p-2 mb-1">
                                            <span class="text-muted">پاسخ شماره : 2 - تاریخ پاسخ : همین امروز - توسط : ادمین سایت</span>
                                            <hr>
                                            <p class="m-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                                        </div>
                                        <div class="border rounded p-2 mb-1">
                                            <span class="text-muted">پاسخ شماره : 2 - تاریخ پاسخ : همین امروز - توسط : ادمین سایت</span>
                                            <hr>
                                            <p class="m-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="#" method="post">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">پاسخ دهی به نظر</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea name="content" id="content" cols="5" rows="10" class="form-control"></textarea>
                                <div class="text-danger"><p>محتوای خطا</p></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.comment.index') }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-left me-2"></i>بازگشت</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save me-2"></i>ذخیره پاسخ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
