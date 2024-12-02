@extends('admin.layouts.master')
@section('title', 'نمایش پست - نوا بلاگ')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">نمایش پست</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">نمایش پست ؟؟؟</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-light">
                            <tbody>
                                <tr>
                                    <th style="width: 15%">عنوان</th>
                                    <td>عنوان پست</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">دسته بندی</th>
                                    <td>مقالات علمی</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">نویسنده</th>
                                    <td>سعید نوری</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تاریخ ایجاد</th>
                                    <td>همین امروز</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تاریخ ویرایش</th>
                                    <td>همین امروز</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">برچست ها</th>
                                    <td>مقاله، نوشته، تکنولوژی، تست</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تعداد لایک</th>
                                    <td>1000 تا لایک</td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">وضعیت</th>
                                    <td><span class="badge bg-success py-2 px-3">منتشر شده</span></td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">تصویر</th>
                                    <td>
                                        <img src="{{ asset('assets/images/post-1.jpg') }}" alt="post image" class="rounded w-25">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">محتوا</th>
                                    <td>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-chevron-left me-2"></i>بازگشت
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
