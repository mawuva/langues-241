<x-admin::layouts.logged title="{{ trans_choice('entity.user', 2) }}"
    description="{{ trans_choice('entity.user', 2) }}" section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.users.deleted') }}" class="btn btn-sm btn-dark">
            {{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.user', 2)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="card">
        <div class="card-header">
            {{ trans_choice('entity.user', 2) }}
        </div>
        <div class="card-body">
            @include('admin::user.section.table', ['displayed' => 'index'])
        </div>
    </div>
</x-admin::layouts.logged>