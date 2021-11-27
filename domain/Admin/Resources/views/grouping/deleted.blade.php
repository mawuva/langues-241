<x-admin::layouts.logged 
    title="{{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.category', 2)
            ]) }}"
    description="{{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.category', 2)
            ]) }}" 
    section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.groupings.create') }}" class="btn btn-sm btn-success">
            {{ __('lang-resources::commons.actions.on_entity', [
            'Action' => __('lang-resources::commons.actions.create'),
            'Entity' => trans_choice('entity.category', 1)
            ]) }}
        </a>
        <a href="{{ route('app.admin.groupings.index') }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.category', 2)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="card card-body">
        @include('admin::grouping.section.table', ['displayed' => 'deleted'])
    </div>
</x-admin::layouts.logged>