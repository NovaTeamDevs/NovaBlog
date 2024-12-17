@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="p-0 m-0">{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <p class="p-0 m-0">{{ session('info') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p class="p-0 m-0">{{ session('warning') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
    </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="p-0 m-0">{{ session('danger') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
    </div>
@endif
