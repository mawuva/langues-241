<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('images/default/logo.png') }}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/default/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth() ->user() ->full_name }}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('app.admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ __('lang-resources::pages.dashboard.name') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('app.admin.admins.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>{{ trans_choice('entity.admin', 2) }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('app.admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            {{ trans_choice('entity.student', 2) }} / {{ trans_choice('entity.user', 2) }}
                        </p>
                    </a>
                </li>
                
                <li class="nav-header">{{ __('displays.formation') }}</li>
                <li class="nav-item">
                    <a href="{{ route('app.admin.languages.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-language"></i>
                        <p> {{ trans_choice('entity.language', 2) }} </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('app.admin.levels.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p> {{ trans_choice('entity.level', 2) }} </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('app.admin.groupings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p> {{ trans_choice('entity.category', 2) }} </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('app.admin.content-types.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p> {{ trans_choice('entity.content_type', 2) }} </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('app.admin.courses.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p> {{ trans_choice('entity.course', 2) }} </p>
                    </a>
                </li>

                <li class="nav-header">{{ __('displays.shop') }}</li>
                <li class="nav-header">{{ __('displays.blog') }}</li>
            </ul>
        </nav>
    </div>
</aside>