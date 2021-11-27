<x-admin::layouts.logged title="{{ trans_choice('entity.user', 1) }}"
    description="{{ trans_choice('entity.user', 1) }}" section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.users.index') }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.user', 2)
            ]) }}
        </a>
        <a href="{{ route('app.admin.users.deleted') }}" class="btn btn-sm btn-dark">
            {{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.user', 2)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="row">
        <div class="col-md-3">
            @include('admin::user.section.box-profile', ['page' => 'show'])
        </div>
        <div class="col-md-9">

        </div>
    </div>
</x-admin::layouts.logged>