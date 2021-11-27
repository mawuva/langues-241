<x-customponents::layouts.master title="{{ $title ?? '' }}" description="{{ $description ?? '' }}" section="Admin">

    <x-customponents-section name="lyt_master_styles">
        <x-customponents::resources.assets type="css" path="{{ asset('css/fas.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('libs/parsley/parsley.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('css/admin.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('css/color.css') }}" />
        @notiflashAssets
        @yield('mst_styles')
    </x-customponents-section>

    {{ $slot }}

    <x-customponents-section name="lyt_master_scripts">
        <x-customponents::resources.assets type="js" path="{{ asset('libs/jquery/jquery.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/bootstrap/bootstrap.bundle.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('js/admin.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/parsley/parsley.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/parsley/i18n/'.LaravelLocalization::getCurrentLocale().'.js') }}" />
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        @yield('mst_scripts')
    </x-customponents-section>

</x-customponents::layouts.master>