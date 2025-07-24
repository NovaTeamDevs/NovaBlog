<!-- Header start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <h1 class="d-none">نوا بلاگ</h1>
            <img src="{{ asset('assets/nova-blog-logo.png') }}" alt="نوا بلاگ" class="w-75">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">تماس با ما</a>
                </li>
            </ul>

            <!-- فرم جستجو در هدر -->
            <form class="d-flex me-3" method="GET" action="{{ route('search') }}">
                <input class="form-control me-2" type="search" name="q" placeholder="جستجو..." value="{{ request()->get('q') }}">
                <button class="btn btn-outline-primary" type="submit">جستجو</button>
            </form>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ auth()->user()->full_name }}</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="display:inline; cursor:pointer;">خروج</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- Header end -->
