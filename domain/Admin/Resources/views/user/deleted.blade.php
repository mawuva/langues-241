<x-admin::layouts.logged 
    title="{{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.user', 2)
            ]) }}"
    description="{{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.user', 2)
            ]) }}" 
    section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.users.index') }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.user', 2)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="card card-body">
        @include('admin::user.section.table', ['displayed' => 'deleted'])
    </div>
</x-admin::layouts.logged>