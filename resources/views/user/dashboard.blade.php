<x-layouts.logged title="{{ __('lang-resources::pages.dashboard.title') }}" 
                    description="{{ __('lang-resources::pages.dashboard.description') }}"
    section="">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('app.home') }}">{{ __('lang-resources::pages.home.name') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('lang-resources::pages.home.name') }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    
    <!--<div class="row">
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div
                    class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center theme-bg mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-book"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    <h4>607</h4> <span>Number of Cources</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div
                    class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-primary mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-video"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    <h4>5.2k</h4> <span>Number of Lession</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div
                    class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-warning mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-users"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    <h4>78k</h4> <span>Number of Students</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div
                    class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-purple mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-gem"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    <h4>32k</h4> <span>Number of Enrollment</span>
                </div>
            </div>
        </div>
    
    </div> -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h5>Featured Cources</h5>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            @foreach ($enrollments as $data)
                <div class="grousp_crs">
                    <div class="grousp_crs_left">
                        <div class="grousp_crs_thumb"><img src="assets/img/c-7.png" class="img-fluid" alt="" /></div>
                        <div class="grousp_crs_caption">
                            <h4>{{ $data ->course ->title }}</h4>
                        </div>
                    </div>
                    <div class="grousp_crs_right">
                        <div class="frt_125"><i class="fas fa-fire text-warning mr-1"></i>8.7</div>
                        <div class="frt_but"><a href="#" class="btn text-white theme-bg">View Course</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layouts.logged>