<x-admin::layouts.logged 
    title="{{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.course', 2)
            ]) }}"
    description="{{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.course', 2)
            ]) }}" 
    section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.courses.create') }}" class="btn btn-sm btn-success">
            {{ __('lang-resources::commons.actions.on_entity', [
            'Action' => __('lang-resources::commons.actions.create'),
            'Entity' => trans_choice('entity.course', 1)
            ]) }}
        </a>
        <a href="{{ route('app.admin.courses.index') }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.course', 2)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="card card-body">
        @include('admin::course.section.table', ['displayed' => 'deleted'])
    </div>
</x-admin::layouts.logged>