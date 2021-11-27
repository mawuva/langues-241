<x-customponents::layouts.master title="{{ $title ?? '' }}" description="{{ $description ?? '' }}"
    section="{{ $section ?? '' }}">

    <x-customponents-section name="lyt_master_styles">
        <x-customponents::resources.assets type="css" path="{{ asset('libs/parsley/parsley.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('libs/skillup/css/styles.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('libs/flag-icons/flag-icons.min.css') }}" />
        @notiflashAssets
    </x-customponents-section>

    <div id="main-wrapper">

        <x-partials.navbar />
        <x:notiflash-messages />

        {{ $slot }}

        <x-partials.footer />

        <x-partials.log-in-modal />
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
    </div>

    <x-customponents-section name="lyt_master_scripts">
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/jquery.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/popper.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/bootstrap.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/slick.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/moment.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/daterangepicker.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/summernote.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/metisMenu.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/select2.min.js') }}" />
<x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/select2.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/skillup/js/custom.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/parsley/parsley.min.js') }}" />
        <x-customponents::resources.assets type="js"
            path="{{ asset('libs/parsley/i18n/'.LaravelLocalization::getCurrentLocale().'.js') }}" />
    </x-customponents-section>

</x-customponents::layouts.master>