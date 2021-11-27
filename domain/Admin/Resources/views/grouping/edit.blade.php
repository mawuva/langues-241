<x-admin::layouts.logged 
    title="{{ __('lang-resources::commons.actions.on_entity', [
                'Action' => __('lang-resources::commons.actions.edit'),
                'Entity' => trans_choice('entity.category', 1)
            ]) }}"
    description="{{ __('lang-resources::commons.actions.on_entity', [
                'Action' => __('lang-resources::commons.actions.edit'),
                'Entity' => trans_choice('entity.category', 1)
            ]) }}" section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.groupings.index') }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.category', 2)
            ]) }}
        </a>
        <a href="{{ route('app.admin.groupings.create') }}" class="btn btn-sm btn-success">
            {{ __('lang-resources::commons.actions.on_entity', [
            'Action' => __('lang-resources::commons.actions.create'),
            'Entity' => trans_choice('entity.category', 1)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="row">
        <div class="col-md-3">
            @include('admin::grouping.section.box-info', ['page' => 'edit'])
        </div>
        <div class="col-md-9">
            <form method="post" action="{{ route('app.admin.groupings.update', ['id' =>$grouping ->_id])}}" class="card"
                data-parsley-validate>
            
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            {{ __('lang-resources::commons.actions.on_entity', [
                            'Action' => __('lang-resources::commons.actions.edit'),
                            'Entity' => trans_choice('entity.category', 1)
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
                    @include('admin::grouping.section.form')
                </div>
            </form>
        </div>
    </div>
</x-admin::layouts.logged>