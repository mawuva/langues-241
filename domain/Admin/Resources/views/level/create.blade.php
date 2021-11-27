<x-admin::layouts.logged 
    title="{{ __('lang-resources::commons.actions.on_entity', [
                'Action' => __('lang-resources::commons.actions.create'),
                'Entity' => trans_choice('entity.level', 1)
            ]) }}"
    description="{{ __('lang-resources::commons.actions.on_entity', [
                'Action' => __('lang-resources::commons.actions.create'),
                'Entity' => trans_choice('entity.level', 1)
            ]) }}" section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.levels.index') }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.level', 2)
            ]) }}
        </a>
        <a href="{{ route('app.admin.levels.deleted') }}" class="btn btn-sm btn-dark">
            {{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
            'Entity' => trans_choice('entity.level', 2)
            ]) }}
        </a>
    </x-customponents-section>

    <form method="post" action="{{ route('app.admin.levels.store')}}" class="card" data-parsley-validate>
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    {{ __('lang-resources::commons.actions.on_entity', [
                    'Action' => __('lang-resources::commons.actions.create'),
                    'Entity' => trans_choice('entity.admin', 1)
                    ]) }}
                </div>
                <div class="col-3 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">
                        {{ __('lang-resources::commons.actions.save') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('admin::level.section.form')
        </div>
    </form>
</x-admin::layouts.logged>