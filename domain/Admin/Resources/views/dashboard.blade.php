<x-admin::layouts.logged 
    title="{{ __('lang-resources::pages.dashboard.title') }}"
    description="{{ __('lang-resources::pages.dashboard.description') }}">

    <h1>Hello World</h1>
    
    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>

</x-admin::layouts.logged>