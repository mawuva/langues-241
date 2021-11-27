<x-layouts.logged title="{{ __('pages.profile.title') }}" description="{{ __('pages.profile.description') }}"
    section="">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('app.home') }}">{{ __('lang-resources::pages.home.name') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('pages.profile.name') }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

</x-layouts.logged>