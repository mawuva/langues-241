<div class="dashboard-navbar">
    <div class="d-user-avater">
        <img src="{{ asset('images/avatars/default.png') }}" class="img-fluid avater" alt="">
        <h4>{{ auth() ->user() ->full_name }}</h4>
        <!--<span>Senior Designer</span> -->
        <div class="elso_syu89">
            <ul>
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
                <li><a href="#"><i class="ti-linkedin"></i></a></li>
            </ul>
        </div>
        <div class="elso_syu77">
            <div class="one_third">
                <div class="one_45ic text-warning bg-light-warning"><i class="fas fa-star"></i></div>
                <span>Ratings</span>
            </div>
            <div class="one_third">
                <div class="one_45ic text-success bg-light-success"><i class="fas fa-file-invoice"></i>
                </div>
                <span>Courses</span>
            </div>
            <div class="one_third">
                <div class="one_45ic text-purple bg-light-purple"><i class="fas fa-user"></i></div>
                <span>Enrolled User</span>
            </div>
        </div>
    </div>

    <div class="d-navigation">
        <ul id="side-menu">
            <li @if (isset($page) && $page === 'dashboard') class="active" @else class="active" @endif>
                <a href="{{ route('app.user.dashboard') }}">
                    <i class="fas fa-th"></i>{{ __('lang-resources::pages.dashboard.name') }}
                </a>
            </li>
            <li @if (isset($page) && $page === 'profile') class="active" @endif>
                <a href="{{ route('app.user.profile') }}">
                    <i class="fas fa-address-card"></i>{{ __('pages.profile.name') }}
                </a>
            </li>
        </ul>
    </div>
</div>