<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/nova-blog-logo-w.png') }}" alt="Nova Blog" class="brand-image opacity-75 shadow">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>داشبورد</p>
                    </a>
                </li>
                <li class="nav-header">محتوا</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-file-earmark-fill"></i>
                        <p>
                            پست ها
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.post.create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>افزودن پست</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.post.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>لیست پست ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-collection-fill"></i>
                        <p>
                            دسته بندی
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>افزودن دسته بندی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>لیست دسته بندی ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-chat-left-fill"></i>
                        <p>
                            نظرات
                            <span class="nav-badge badge text-bg-danger me-3">6</span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.comment.index', ['status' => '0']) }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>نظرات در انتظار</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.comment.index', ['status' => '1']) }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>نظرات تایید شده</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.comment.index', ['status' => '2']) }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>نظرات رد شده</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.comment.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>تمام نظرات</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">کاربران</li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>کاربران</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
