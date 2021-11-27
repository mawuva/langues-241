<div class="header header-transparent dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('app.home') }}">
                    <img src="{{ asset('images/default/logo.png') }}" width="30" class="logo" alt="" />
                    <span style="color: #000;">{{ config('app.name') }}</span>
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        @guest
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#login" class="crs_yuo12 w-auto text-white theme-bg">
                                    <span class="embos_45">
                                        <i class="fas fa-sign-in-alt mr-1"></i>
                                        {{ __('lang-resources::displays.auth.sign_in') }}
                                    </span>
                                </a>
                            </li>    
                        @endguest

                        @auth
                            <x-partials.logged-menu />
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">
                    <li>
                        <a href="{{ route('app.home') }}">
                            {{ __('lang-resources::pages.home.name') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('app.about') }}">
                            {{ __('lang-resources::pages.about.name') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('app.course.index') }}">
                            {{ __('pages.courses.name') }}
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('app.shop.index') }}">
                            {{ __('pages.shop.name') }}
                        </a>
                    </li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li>
                        <a href="#">
                            @php
                                $currentLocaleCode = (LaravelLocalization::getCurrentLocale() === 'en') ? 'gb' : LaravelLocalization::getCurrentLocale();
                            @endphp
                            <span class="flag-icon flag-icon-{{ $currentLocaleCode }}"></span>
                            <span class="submenu-indicator"></span>
                        </a>
                        <ul class="nav-dropdown nav-submenu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" rel="alternate" hreflang="{{ $localeCode }}">
                                        {{ ucfirst($properties['native']) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    @guest
                        <li>
                            <a href="#" class="alio_green" data-toggle="modal" data-target="#login">
                                <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">
                                    {{ __('lang-resources::displays.auth.sign_in') }}
                                </span>
                            </a>
                        </li>
                        <li class="add-listing theme-bg">
                            <a href="{{ route('app.auth.register') }}" class="text-white">
                                {{ __('displays.get_started') }}
                            </a>
                        </li>
                    @endguest
                    
                    @auth
                        <x-partials.logged-menu />
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="clearfix"></div>