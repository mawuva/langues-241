
<x-admin::layouts.logged title="{{ trans_choice('entity.level', 2) }}"
    description="{{ trans_choice('entity.level', 2) }}" section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.levels.create') }}" class="btn btn-sm btn-success">
            {{ __('lang-resources::commons.actions.on_entity', [
                'Action' => __('lang-resources::commons.actions.create'),
                'Entity' => trans_choice('entity.level', 1)
            ]) }}
        </a>
        <a href="{{ route('app.admin.levels.deleted') }}" class="btn btn-sm btn-dark">
            {{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
                'Entity' => trans_choice('entity.level', 2)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="card">
        <div class="card-header">
            {{ trans_choice('entity.admin', 2) }}
        </div>
        <div class="card-body">
            @include('admin::level.section.table', ['displayed' => 'index'])
        </div>
    </div>
</x-admin::layouts.logged>