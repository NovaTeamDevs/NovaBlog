@extends('admin.layouts.master')
@section('title', 'Nova Blog Admin - Dashboard')

@section('content')
    <main class="app-main"> <!--begin::App Content Header-->
        <div class="app-content-header"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">داشبورد</h3>
                    </div>
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content Header--> <!--begin::App Content-->
        <div class="app-content"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row"> <!--begin::Col-->

                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                        <div class="small-box text-bg-primary">
                            <div class="inner">
                                <h3>{{ App\Models\User::all()->count() }}</h3>
                                <p>کاربران</p>
                            </div>
                            <i class="bi bi-people-fill small-box-icon"></i>
                            <a href="{{ route('admin.user.index') }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">لیست
                                کاربران <i class="bi bi-link-45deg"></i> </a>
                        </div> <!--end::Small Box Widget 1-->
                    </div> <!--end::Col-->

                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 2-->
                        <div class="small-box text-bg-success">
                            <div class="inner">
                                <h3>{{ App\Models\Post::all()->count() }}</h3>
                                <p>تعداد مقالات</p>
                            </div>
                            <i class="bi bi-file-earmark-text-fill small-box-icon"></i>
                            <a href="{{ route('admin.post.index') }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                تمام مقالات <i class="bi bi-link-45deg"></i> </a>
                        </div> <!--end::Small Box Widget 2-->
                    </div> <!--end::Col-->

                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 3-->
                        <div class="small-box text-bg-warning">
                            <div class="inner">
                                <h3>{{ App\Models\Comment::where('status', App\Enum\CommentStatusEnum::Pending)->get()->count() }}
                                </h3>
                                <p>نظرات در انتظار</p>
                            </div>
                            <i class="bi bi-chat-square-text-fill small-box-icon"></i>
                            <a href="{{ route('admin.comment.index', ['status' => 0]) }}"
                                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                مشاهده نظرات در انتظار <i class="bi bi-link-45deg"></i> </a>
                        </div> <!--end::Small Box Widget 3-->
                    </div> <!--end::Col-->

                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 4-->
                        <div class="small-box text-bg-danger">
                            <div class="inner">
                                <h3>{{ App\Models\Comment::where('status', App\Enum\CommentStatusEnum::Rejected)->get()->count() }}
                                </h3>
                                <p>نظرات رد شده</p>
                            </div>
                            <i class="bi bi-chat-square-text-fill small-box-icon"></i>
                            <a href="{{ route('admin.comment.index', ['status' => 2]) }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                مشاهده نظرات رد شده <i class="bi bi-link-45deg"></i> </a>
                        </div> <!--end::Small Box Widget 4-->
                    </div> <!--end::Col-->

                </div> <!--end::Row--> <!--begin::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content-->
    </main> <!--end::App Main--> <!--begin::Footer-->
@endsection
