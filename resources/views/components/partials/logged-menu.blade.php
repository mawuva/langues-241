<li class="account-drop">
    <a href="javascript:void(0);" class="crs_yuo12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="embos_45"><i class="fas fa-shopping-basket"></i><i class="embose_count">4</i></span>
    </a>
    <div class="dropdown-menu pull-right animated flipInX">
        <div class="drp_menu_headr bg-purple">
            <h4>Wishlist Product</h4>
        </div>
        <div class="ground-list ground-hover-list">
            <div class="ground ground-list-single">
                <div class="grd_thum"><img src="assets/img/cr-1.jpg" class="img-fluid rounded" width="50" alt="" />
                </div>
                <div class="ground-content">
                    <h6>Web History<small class="float-right text-fade">$120</small></h6>
                    <a href="#" class="small text-danger">Remove</a>
                </div>
            </div>

            <div class="ground ground-list-single">
                <div class="grd_thum"><img src="assets/img/cr-3.jpg" class="img-fluid rounded" width="50" alt="" />
                </div>
                <div class="ground-content">
                    <h6>Physics Beginning<small class="float-right text-fade">$99</small></h6>
                    <a href="#" class="small text-danger">Remove</a>
                </div>
            </div>

            <div class="ground ground-list-single">
                <div class="grd_thum"><img src="assets/img/cr-4.jpg" class="img-fluid rounded" width="50" alt="" />
                </div>
                <div class="ground-content">
                    <h6>Computer Fundamental<small class="float-right text-fade">$99</small></h6>
                    <a href="#" class="small text-danger">Remove</a>
                </div>
            </div>

            <div class="ground ground-list-single">
                <div class="grd_thum"><img src="assets/img/cr-5.jpg" class="img-fluid rounded" width="50" alt="" />
                </div>
                <div class="ground-content">
                    <h6>Computer Advance<small class="float-right text-fade">$49</small></h6>
                    <a href="#" class="small text-danger">Remove</a>
                </div>
            </div>

            <div class="ground ground-list-single">
                <button type="button" class="btn theme-bg text-white full-width">Go To Cart</button>
            </div>

        </div>
    </div>
</li>
<li class="account-drop">
    <a href="javascript:void(0);" class="crs_yuo12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="embos_45"><i class="fas fa-bell"></i><i class="embose_count red">3</i></span>
    </a>
    <div class="dropdown-menu pull-right animated flipInX">
        <div class="drp_menu_headr bg-warning">
            <h4>22 Notifications</h4>
        </div>
        <div class="ground-list ground-hover-list">
            <div class="ground ground-list-single">
                <div
                    class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-success">
                    <div class="position-absolute text-success h5 mb-0"><i class="fas fa-user"></i></div>
                </div>

                <div class="ground-content">
                    <h6><a href="#">Maryam Amiri</a></h6>
                    <small class="text-fade">New User Enrolled in Python</small>
                    <span class="small">Just Now</span>
                </div>
            </div>

            <div class="ground ground-list-single">
                <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-danger">
                    <div class="position-absolute text-danger h5 mb-0"><i class="fas fa-comments"></i></div>
                </div>

                <div class="ground-content">
                    <h6><a href="#">Shilpa Rana</a></h6>
                    <small class="text-fade">Shilpa Send a Message</small>
                    <span class="small">02 Min Ago</span>
                </div>
            </div>

            <div class="ground ground-list-single">
                <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-info">
                    <div class="position-absolute text-info h5 mb-0"><i class="fas fa-grin-squint-tears"></i></div>
                </div>

                <div class="ground-content">
                    <h6><a href="#">Amar Muskali</a></h6>
                    <small class="text-fade">Need Responsive Business Tem...</small>
                    <span class="small">10 Min Ago</span>
                </div>
            </div>

            <div class="ground ground-list-single">
                <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-purple">
                    <div class="position-absolute text-purple h5 mb-0"><i class="fas fa-briefcase"></i></div>
                </div>

                <div class="ground-content">
                    <h6><a href="#">Maryam Amiri</a></h6>
                    <small class="text-fade">Next Meeting on Tuesday..</small>
                    <span class="small">15 Min Ago</span>
                </div>
            </div>

        </div>
    </div>
</li>
<li>
    <div class="btn-group account-drop">
        <a href="javascript:void(0);" class="crs_yuo12 btn btn-order-by-filt" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('images/default/user.png') }}" style="width:30px !important;" class="avater-img" alt="Avatar">
        </a>
        <div class="dropdown-menu pull-right animated flipInX">
            <div class="drp_menu_headr">
                <h4>Hi, {{ auth() -> user() ->full_name }}</h4>
            </div>
            <ul>
                <li>
                    <a href="{{ route('app.user.dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        {{ __('lang-resources::pages.dashboard.name') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.user.profile') }}">
                        <i class="fa fa-user-tie"></i>
                        {{ __('pages.profile.name') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.auth.logout') }}">
                        <i class="fa fa-unlock-alt"></i>
                        {{ __('lang-resources::displays.auth.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</li>