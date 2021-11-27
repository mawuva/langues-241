<x-admin::layouts.logged 
    title="{{ trans_choice('entity.language', 1) }}"
    description="{{ trans_choice('entity.language', 1) }}" section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.languages.index') }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.language', 2)
            ]) }}
        </a>
        <a href="{{ route('app.admin.languages.create') }}" class="btn btn-sm btn-success">
            {{ __('lang-resources::commons.actions.on_entity', [
            'Action' => __('lang-resources::commons.actions.create'),
            'Entity' => trans_choice('entity.language', 1)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="row">
        <div class="col-md-3">
            @include('admin::language.section.box-info', ['page' => 'show'])
        </div>
        <div class="col-md-9">

        </div>
    </div>
</x-admin::layouts.logged>