@if (session()->has('success'))
    <div class="col-xl-12">
        <div class="alert alert-success left-icon-big alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="mdi mdi-btn-close"></i></span>
            </button>
            <div class="media">
                <div class="alert-left-icon-big">
                    <span><i class="mdi mdi-check-circle-outline"></i></span>
                </div>
                <div class="media-body">
                    <p class="mt-2">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="col-xl-12">
        <div class="alert alert-danger left-icon-big alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="mdi mdi-btn-close"></i></span>
            </button>
            <div class="media">
                <div class="alert-left-icon-big">
                    <span><i class="mdi mdi-alert"></i></span>
                </div>
                <div class="media-body">
                    <p class="mt-2">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session()->has('warning'))
    <div class="col-xl-12">
        <div class="alert alert-warning left-icon-big alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="mdi mdi-btn-close"></i></span>
            </button>
            <div class="media">
                <div class="alert-left-icon-big">
                    <span><i class="mdi mdi-help-circle-outline"></i></span>
                </div>
                <div class="media-body">
                    <p class="mt-2">{{ session('warning') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
