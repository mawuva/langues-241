<x-admin::layouts.master 
    title="{{ $title ?? '' }}" 
    description="{{ $description ?? '' }}" 
    section="Admin">

    <x-customponents-section name="body_attributes">
        class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed"
    </x-customponents-section>

    <x-customponents-section name="mst_styles">
        <x-customponents::resources.assets type="css" path="{{ asset('libs/flag-icons/flag-icons.min.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('libs/dataTables/css/dataTables.bootstrap4.min.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('libs/dataTables/css/responsive.bootstrap4.min.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('libs/dataTables/css/buttons.bootstrap4.min.css') }}" />
        <x-customponents::resources.assets type="css" path="{{ asset('libs/fileinput/fileinput.min.css') }}" />
    </x-customponents-section>

    <div class="wrapper">

        <x-admin::partials.navbar />
        <x-admin::partials.sidebar />

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title ?? 'No Title' }}</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            @yield('header_action')
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content">
                <div class="container-fluid">
                    <x:notiflash-messages />
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <x-customponents-section name="mst_scripts">
        <x-customponents::resources.assets type="js" path="{{ asset('libs/dataTables/js/jquery.dataTables.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/dataTables/js/dataTables.bootstrap4.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/fileinput/fileinput.min.js') }}" />
        <x-customponents::resources.assets type="js" path="{{ asset('libs/ckeditor/ckeditor.js') }}" />
        
        <script>
            $('#dt').dataTable();

            $("#file-3").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                language: 'fr',
                browseClass: "btn btn-sm btn-primary font-weight-bold",
                cancelClass: "btn btn-sm btn-danger font-weight-bold",
                fileType: "any",
                previewFileIcon: "<i class='fas fa-chess-king'></i>",
                overwriteInitial: false,
                initialPreviewAsData: true,
            });
        </script>
        @yield('logged_scripts')
    </x-customponents-section>

</x-admin::layouts.master>