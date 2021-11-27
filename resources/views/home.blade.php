<x-layouts.master title="{{ __('lang-resources::pages.home.title') }}" 
                    description="{{ __('lang-resources::pages.home.description') }}" section="">

    <div class="hero_banner image-cover image_bottom" style="background:#f7f8f9 url(assets/img/banner-1.png) no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-10 col-sm-12">
                    <div class="simple-search-wrap">
                        <div class="hero_search-2 text-center">
                            <!--<div class="elsio_tag">LISTEN TO OUR NEW ANTHEM</div> -->
                            <h1 class="banner_title mb-4">{{ __('displays.slogan') }}</h1>
                            <p class="font-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation.</p>
                            <div class="input-group simple_search">
                                <i class="fa fa-search ico"></i>
                                <input type="text" class="form-control" placeholder="Search Your Cources">
                                <div class="input-group-append">
                                    <button class="btn theme-bg" type="button">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="crp_box ovr_top">
                        <div class="row align-items-center m-0">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                                <div class="crp_tags">
                                    <!--<h6>Over 700+ Cources in one place</h6> -->
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                                <div class="part_rcp">
                                    <ul>
                                        <li>
                                            <div class="crp_img"><img src="assets/img/lg-1.png" class="img-fluid" alt="" />
                                            </div>
                                        </li>
                                        <li>
                                            <div class="crp_img"><img src="assets/img/lg-5.png" class="img-fluid" alt="" />
                                            </div>
                                        </li>
                                        <li>
                                            <div class="crp_img"><img src="assets/img/lg-6.png" class="img-fluid" alt="" />
                                            </div>
                                        </li>
                                        <li>
                                            <div class="crp_img"><img src="assets/img/lg-7.png" class="img-fluid" alt="" />
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>explore Featured <span class="theme-cl">Cources</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>
    
            <div class="row justify-content-center">
                @foreach ($courses as $data)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="crs_grid">
                            <div class="crs_grid_thumb">
                                <a href="course-detail.html" class="crs_detail_link">
                                    <img src="{{ ($data ->image !== null) ? asset('storage/'.$data ->image ->url) : asset('images/default/course.png') }}" 
                                        class="img-fluid rounded"
                                        alt="{{ $data ->slug }}"
                                        title="{{ $data ->name }}">
                                </a>
                                <div class="crs_video_ico">
                                    <i class="fa fa-play"></i>
                                </div>
                                <div class="crs_locked_ico">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <a href="{{ route('app.course.category', ['category_id' =>$data ->grouping ->_id]) }}" class="crs_fl_first">
                                        <div class="crs_cates cl_8"><span>{{ $data ->grouping ->name }}</span></div>
                                    </a>
                                    <div class="crs_fl_last">
                                        <div class="crs_inrolled"><strong>8,350</strong>Enrolled</div>
                                    </div>
                                </div>
                                <div class="crs_title">
                                    <h4>
                                        <a href="{{ route('app.course.show', ['id' =>$data ->_id]) }}" class="crs_title_link">
                                            {{ $data ->title }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="crs_info_detail">
                                    <ul>
                                        <li><i class="fa fa-clock text-danger"></i><span>10 hr 07 min</span></li>
                                        <li><i class="fa fa-video text-success"></i><span>67 Lectures</span></li>
                                        <li><i class="fa fa-signal text-warning"></i><span>{{ $data ->level ->name }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <!--<div class="crs_tutor">
                                            <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="assets/img/user-6.jpg"
                                                        class="img-fluid circle" alt="" /></a></div>
                                            <div class="crs_tutor_name"><a href="instructor-detail.html">Robert Fox</a></div>
                                        </div> -->
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_price">
                                            <h2>
                                                <span class="theme-cl">{{ number_format($data ->fee, 0, '.', ',') }} </span>
                                                <span class="currency"> Fcfa </span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8 mt-2">
                    <div class="text-center">
                        <a href="{{ route('app.course.index') }}" class="btn btn-md theme-bg-light theme-cl">
                            {{ __('displays.explore_more_course') }}
                        </a>
                    </div>
                </div>
            </div>
    
        </div>
    </section>

    <section class="min gray">
        <div class="container">
    
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Explore Featured <span class="theme-cl">Categories</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>
    
    
            <div class="row justify-content-center">
                @foreach ($languages as $data)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="crs_cate_wrap style_2">
                            <a href="grid-layout-with-sidebar.html" class="crs_cate_box">
                                <div class="crs_cate_icon">
                                    <img src="{{ ($data ->image !== null) ? asset('storage/'.$data ->image ->url_sm) : asset('images/default/language.png') }}" 
                                        class="img-fluid img-thumbnail img-circle" width="75"
                                        alt="{{ $data ->slug }}"
                                        title="{{ $data ->name }}">
                                </div>
                                <div class="crs_cate_caption">
                                    <span>{{ $data ->name }}</span>
                                </div>
                                <div class="crs_cate_count"><span>22 Courses</span></div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
    
        </div>
    </section>
    <div class="clearfix"></div>

    <section>
        <div class="container">
    
            <div class="row align-items-center justify-content-between mb-5">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="lmp_caption">
                        <h2 class="mb-3">We Have The Best Instructors Available in The City</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                            provident, similique</p>
                        <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                            <div class="d-flex align-items-center">
                                <div
                                    class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h6 class="mb-0 ml-3">Full lifetime access</h6>
                            </div>
                        </div>
                        <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                            <div class="d-flex align-items-center">
                                <div
                                    class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h6 class="mb-0 ml-3">20+ downloadable resources</h6>
                            </div>
                        </div>
                        <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                            <div class="d-flex align-items-center">
                                <div
                                    class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h6 class="mb-0 ml-3">Certificate of completion</h6>
                            </div>
                        </div>
                        <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                            <div class="d-flex align-items-center">
                                <div
                                    class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h6 class="mb-0 ml-3">Free Trial 7 Days</h6>
                            </div>
                        </div>
                        <div class="text-left mt-4"><a href="#" class="btn btn-md text-light theme-bg">Enrolled Today</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="lmp_thumb">
                        <img src="assets/img/lmp-2.png" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="pt-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="lmp_thumb">
                        <img src="assets/img/lmp-1.png" class="img-fluid" alt="" />
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="lmp_caption">
                        <ol class="list-unstyled p-0">
                            <li class="d-flex align-items-start my-3 my-md-4">
                                <div
                                    class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                    <div class="position-absolute text-white h5 mb-0">1</div>
                                </div>
                                <div class="ml-3 ml-md-4">
                                    <h4>Create account</h4>
                                    <p>
                                        Oluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start my-3 my-md-4">
                                <div
                                    class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                    <div class="position-absolute text-white h5 mb-0">3</div>
                                </div>
                                <div class="ml-3 ml-md-4">
                                    <h4>Join Membership</h4>
                                    <p>
                                        Error sit voluptatem actium doloremque laudantium, totam rem aperiam, eaque ipsa.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start my-3 my-md-4">
                                <div
                                    class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                    <div class="position-absolute text-white h5 mb-0">3</div>
                                </div>
                                <div class="ml-3 ml-md-4">
                                    <h4>Start Learning</h4>
                                    <p>
                                        Error sit voluptatem actium doloremque laudantium, totam rem aperiam, eaque ipsa.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start my-3 my-md-4">
                                <div
                                    class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                    <div class="position-absolute text-white h5 mb-0">4</div>
                                </div>
                                <div class="ml-3 ml-md-4">
                                    <h4>Get Certificate</h4>
                                    <p>
                                        Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                                        rem aperiam, eaque ipsa.
                                    </p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
    
        </div>
    </section>
    <div class="clearfix"></div>

</x-layouts.master>