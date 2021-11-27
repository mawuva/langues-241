<x-layouts.master title="{{ __('lang-resources::pages.home.title') }}"
    description="{{ __('lang-resources::pages.home.description') }}" section="">

    <section>
        <div class="ed_detail_head bg-cover" style="background:#f4f4f4 url({{ ($course ->image !== null) ? asset('storage/'.$course ->image ->url) : asset('images/default/course.png') }});" data-overlay="8">
            <div class="container">
                <div class="row align-items-center">
        
                    <div class="col-lg-7 col-md-7">
                        <div class="ed_detail_wrap light">
                            <div class="crs_cates cl_1"><span>{{ $course ->grouping ->name }}</span></div>
                            <div class="ed_header_caption">
                                <h2 class="ed_title">{{ $course ->title }}</h2>
                                <ul>
                                    <li><i class="ti-calendar"></i>10 - 20 weeks</li>
                                    <li><i class="ti-control-forward"></i>102 Lectures</li>
                                    <li><i class="ti-user"></i>502 Student Enrolled</li>
                                </ul>
                            </div>
                            <div class="ed_header_short">
                                <p>{{ $course ->short_description }}</p>
                            </div>
        
                            <div class="ed_rate_info">
                                <div class="star_info">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="review_counter">
                                    <strong class="high">4.7</strong> 3572 Reviews
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gray pt-3">
        <div class="container">
            <div class="row justify-content-between">
    
                <div class="col-lg-8 col-md-12 order-lg-first">
                    <div class="tab_box_info mt-4">
                        <ul class="nav nav-pills mb-3 light" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="pill" href="#overview" role="tab"
                                    aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="curriculum-tab" data-toggle="pill" href="#curriculum" role="tab"
                                    aria-controls="curriculum" aria-selected="false">Curriculum</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" id="instructors-tab" data-toggle="pill" href="#instructors" role="tab"
                                    aria-controls="instructors" aria-selected="false">Instructor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-toggle="pill" href="#reviews" role="tab"
                                    aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li> -->
                        </ul>
    
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview-tab">
                                <!-- Overview -->
                                <div class="edu_wraper">
                                    <h4 class="edu_title">Course Overview</h4>
                                    <p>{!! $course ->description !!}</p>
                                    <br>

                                    <h6>Requirements</h6>
                                    <ul class="simple-list p-0">
                                        <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                                        <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                                        <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                                        <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                                        <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                                    </ul>
                                </div>
    
                                <div class="edu_wraper">
                                    <h4 class="edu_title">Certification</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                        voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                        occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt
                                        mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                                        expedita distinctio.</p>
                                    <p>Aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto. Sam
                                        voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                                        magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                </div>
    
                                <!-- Overview -->
                                <div class="edu_wraper">
                                    <h4 class="edu_title">What you'll learn</h4>
                                    <ul class="lists-3 row">
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                        <li class="col-xl-4 col-lg-6 col-md-6 m-0">At vero eos et accusamus</li>
                                    </ul>
                                </div>
                            </div>
    
                            <!-- Curriculum Detail -->
                            <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                <div class="edu_wraper">
                                    <h4 class="edu_title">Course Circullum</h4>
                                    <div id="accordionExample" class="accordion shadow circullum">
    
                                        <!-- Part 1 -->
                                        <div class="card">
                                            <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne"
                                                        class="d-block position-relative text-dark collapsible-link py-2">Part
                                                        01: How To Learn Web Designing Step by Step</a></h6>
                                            </div>
                                            <div id="collapseOne" aria-labelledby="headingOne"
                                                data-parent="#accordionExample" class="collapse show">
                                                <div class="card-body pl-3 pr-3">
                                                    <ul class="lectures_lists">
                                                        <li class="complete">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fas fa-check dios"></i></div>Web Designing
                                                            Beginner<span class="cls_timing">40:20</span>
                                                        </li>
                                                        <li class="progressing">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fas fa-play dios"></i></div>Startup Designing
                                                            with HTML5 & CSS3<span class="cls_timing">20:12</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How To Call
                                                            Google Map iFrame<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>Create Drop Down
                                                            Navigation Using CSS3<span class="cls_timing">25:05</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How to Create
                                                            Sticky Navigation Using JS<span class="cls_timing">18:10</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
    
                                        <!-- Part 2 -->
                                        <div class="card">
                                            <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                                <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                        data-target="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo"
                                                        class="d-block position-relative collapsed text-dark collapsible-link py-2">Part
                                                        02: Learn Web Designing in Basic Level</a></h6>
                                            </div>
                                            <div id="collapseTwo" aria-labelledby="headingTwo"
                                                data-parent="#accordionExample" class="collapse">
                                                <div class="card-body pl-3 pr-3">
                                                    <ul class="lectures_lists">
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How To Call
                                                            Google Map iFrame<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How To embed
                                                            video in html5 banner?<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How to use SVG
                                                            card in html5?<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>Create Drop Down
                                                            Navigation Using CSS3<span class="cls_timing">25:05</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How to Create
                                                            Sticky Navigation Using JS<span class="cls_timing">18:10</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
    
                                        <!-- Part 3 -->
                                        <div class="card">
                                            <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                                                <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                        data-target="#collapseThree" aria-expanded="false"
                                                        aria-controls="collapseThree"
                                                        class="d-block position-relative collapsed text-dark collapsible-link py-2">Part
                                                        03: Learn Web Designing in Advance Level</a></h6>
                                            </div>
                                            <div id="collapseThree" aria-labelledby="headingThree"
                                                data-parent="#accordionExample" class="collapse">
                                                <div class="card-body pl-3 pr-3">
                                                    <ul class="lectures_lists">
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How To Call
                                                            Google Map iFrame<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How To embed
                                                            video in html5 banner?<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How to use SVG
                                                            card in html5?<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>Create Drop Down
                                                            Navigation Using CSS3<span class="cls_timing">25:05</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How to Create
                                                            Sticky Navigation Using JS<span class="cls_timing">18:10</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
    
                                        <!-- Part 04 -->
                                        <div class="card">
                                            <div id="headingFour" class="card-header bg-white shadow-sm border-0">
                                                <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                        data-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour"
                                                        class="d-block position-relative collapsed text-dark collapsible-link py-2">Part
                                                        04: How To Become Succes in Designing & Development?</a></h6>
                                            </div>
                                            <div id="collapseFour" aria-labelledby="headingFour"
                                                data-parent="#accordionExample" class="collapse">
                                                <div class="card-body pl-3 pr-3">
                                                    <ul class="lectures_lists">
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How To Call
                                                            Google Map iFrame<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How To embed
                                                            video in html5 banner?<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How to use SVG
                                                            card in html5?<span class="cls_timing">32:10</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>Create Drop Down
                                                            Navigation Using CSS3<span class="cls_timing">25:05</span>
                                                        </li>
                                                        <li class="unview">
                                                            <div class="lectures_lists_title"><i
                                                                    class="fa fa-lock dios lock"></i></div>How to Create
                                                            Sticky Navigation Using JS<span class="cls_timing">18:10</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
    
                            <!-- Instructor Detail -->
                            <div class="tab-pane fade" id="instructors" role="tabpanel" aria-labelledby="instructors-tab">
                                <div class="single_instructor">
                                    <div class="single_instructor_thumb">
                                        <a href="#"><img src="assets/img/user-4.jpg" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single_instructor_caption">
                                        <h4><a href="#">Jonathan Campbell</a></h4>
                                        <ul class="instructor_info">
                                            <li><i class="ti-video-camera"></i>72 Videos</li>
                                            <li><i class="ti-control-forward"></i>102 Lectures</li>
                                            <li><i class="ti-user"></i>Exp. 4 Year</li>
                                        </ul>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                            excepturi.</p>
                                        <ul class="social_info">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Reviews Detail -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
    
                                <!-- Overall Reviews -->
                                <div class="rating-overview">
                                    <div class="rating-overview-box">
                                        <span class="rating-overview-box-total">4.2</span>
                                        <span class="rating-overview-box-percent">out of 5.0</span>
                                        <div class="star-rating" data-rating="5"><i class="ti-star"></i><i
                                                class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i
                                                class="ti-star"></i>
                                        </div>
                                    </div>
    
                                    <div class="rating-bars">
                                        <div class="rating-bars-item">
                                            <span class="rating-bars-name">5 Star</span>
                                            <span class="rating-bars-inner">
                                                <span class="rating-bars-rating high" data-rating="4.7">
                                                    <span class="rating-bars-rating-inner" style="width: 85%;"></span>
                                                </span>
                                                <strong>85%</strong>
                                            </span>
                                        </div>
                                        <div class="rating-bars-item">
                                            <span class="rating-bars-name">4 Star</span>
                                            <span class="rating-bars-inner">
                                                <span class="rating-bars-rating good" data-rating="3.9">
                                                    <span class="rating-bars-rating-inner" style="width: 75%;"></span>
                                                </span>
                                                <strong>75%</strong>
                                            </span>
                                        </div>
                                        <div class="rating-bars-item">
                                            <span class="rating-bars-name">3 Star</span>
                                            <span class="rating-bars-inner">
                                                <span class="rating-bars-rating mid" data-rating="3.2">
                                                    <span class="rating-bars-rating-inner" style="width: 52.2%;"></span>
                                                </span>
                                                <strong>53%</strong>
                                            </span>
                                        </div>
                                        <div class="rating-bars-item">
                                            <span class="rating-bars-name">1 Star</span>
                                            <span class="rating-bars-inner">
                                                <span class="rating-bars-rating poor" data-rating="2.0">
                                                    <span class="rating-bars-rating-inner" style="width:20%;"></span>
                                                </span>
                                                <strong>20%</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Reviews -->
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Item Reviews - <span> 3 </span></h3>
                                    </div>
                                    <div class="reviews-comments-wrap">
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="assets/img/user-1.jpg" class="img-fluid" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#">Josaph Manrty</a><span class="reviews-comments-item-date"><i
                                                            class="ti-calendar theme-cl"></i>27 Oct 2019</span></h4>
    
                                                <div class="listing-rating"><i class="fas fa-star active"></i><i
                                                        class="fas fa-star active"></i><i class="fas fa-star active"></i><i
                                                        class="fas fa-star active"></i><i class="fas fa-star active"></i>
                                                </div>
                                                <div class="clearfix"></div>
                                                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit
                                                    enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis
                                                    quis nunc tellus sollicitudin mauris. "</p>
                                                <div class="pull-left reviews-reaction">
                                                    <a href="#" class="comment-like active"><i class="ti-thumb-up"></i>
                                                        12</a>
                                                    <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i>
                                                        1</a>
                                                    <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
    
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="assets/img/user-2.jpg" class="img-fluid" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#">Rita Chawla</a><span class="reviews-comments-item-date"><i
                                                            class="ti-calendar theme-cl"></i>2 Nov May 2019</span></h4>
    
                                                <div class="listing-rating"><i class="fas fa-star active"></i><i
                                                        class="fas fa-star active"></i><i class="fas fa-star active"></i><i
                                                        class="fas fa-star active"></i><i class="fas fa-star"></i></div>
                                                <div class="clearfix"></div>
                                                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit
                                                    enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis
                                                    quis nunc tellus sollicitudin mauris. "</p>
                                                <div class="pull-left reviews-reaction">
                                                    <a href="#" class="comment-like active"><i class="ti-thumb-up"></i>
                                                        12</a>
                                                    <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i>
                                                        1</a>
                                                    <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
    
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="assets/img/user-3.jpg" class="img-fluid" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#">Adam Wilsom</a><span class="reviews-comments-item-date"><i
                                                            class="ti-calendar theme-cl"></i>10 Nov 2019</span></h4>
    
                                                <div class="listing-rating"><i class="fas fa-star active"></i><i
                                                        class="fas fa-star active"></i><i class="fas fa-star active"></i><i
                                                        class="fas fa-star active"></i><i class="fas fa-star active"></i>
                                                </div>
                                                <div class="clearfix"></div>
                                                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit
                                                    enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis
                                                    quis nunc tellus sollicitudin mauris. "</p>
                                                <div class="pull-left reviews-reaction">
                                                    <a href="#" class="comment-like active"><i class="ti-thumb-up"></i>
                                                        12</a>
                                                    <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i>
                                                        1</a>
                                                    <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
    
                                    </div>
                                </div>
    
                                <!-- Submit Reviews -->
                                <div class="edu_wraper">
                                    <h4 class="edu_title">Submit Reviews</h4>
                                    <div class="review-form-box form-submit">
                                        <form>
                                            <div class="row">
    
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input class="form-control" type="text" placeholder="Your Name">
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" type="email" placeholder="Your Email">
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Review</label>
                                                        <textarea class="form-control ht-140"
                                                            placeholder="Review"></textarea>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn theme-bg btn-md">Submit
                                                            Review</button>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </form>
                                    </div>
                                </div>
    
                            </div>
    
                        </div>
                    </div>
    
                </div>
                <div class="col-lg-4 col-md-12  order-lg-last">
    
                    <div class="ed_view_box style_3 ovrlio stick_top">
    
                        <div class="property_video sm">
                            <div class="thumb">
                                <img class="pro_img img-fluid w100" src="{{ ($course ->image !== null) ? asset('storage/'.$course ->image ->url) : asset('images/default/course.png') }}" alt="7.jpg">
                                <div class="overlay_icon">
                                    <div class="bb-video-box">
                                        <div class="bb-video-box-inner">
                                            <div class="bb-video-box-innerup">
                                                <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal"
                                                    data-target="#popup-video" class="theme-cl"><i
                                                        class="ti-control-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="ed_view_price pl-4">
                            <span>Acctual Price</span>
                            <h2 class="theme-cl">{{ number_format($course ->fee, 0, '.', ',') }} Fcfa</h2>
                        </div>
    
                        <div class="ed_view_short pl-4 pr-4 pb-2">
                            <p>{{ $course ->short_description }}</p>
                        </div>
    
                        <div class="ed_view_features half_list pl-4 pr-3">
                            <span>Course Features</span>
                            <ul>
                                <li><i class="ti-user"></i>3k Students View</li>
                                <li><i class="ti-time"></i>2 hour 30 min</li>
                                <li><i class="ti-bar-chart-alt"></i>Principiante</li>
                                <li><i class="ti-cup"></i>04 Certified</li>
                            </ul>
                        </div>
                        <div class="ed_view_link">
                            <!--<a href="#" class="btn theme-light enroll-btn">Get Membership<i class="ti-angle-right"></i></a> -->
                            <a href="{{ route('app.course.enroll', ['id' => $course ->id]) }}" class="btn theme-bg enroll-btn">
                                Enroll Now<i class="ti-angle-right"></i>
                            </a>
                            <br>
                            <form action="https://mypvit.com/airtelmoneypvit.kk" method="POST">
                                <input type="hidden" name="tel_marchand" value="074064839" />
                                <input type="hidden" name="montant" value="40000">
                                <input type="hidden" name="ref" value="{{ rand(5, 5) }}" />
                                <input type="hidden" name="redirect" value="{{ route('app.course.info') }}" />
                                <button type="submit" name="payer" class="btn btn-md btn-block btn-danger white-text">
                                    Payer avec AirtelMoney
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section>

</x-layouts.master>