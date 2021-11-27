<x-admin::layouts.logged 
    title="{{ __('lang-resources::commons.actions.on_entity', [
                'Action' => __('lang-resources::commons.actions.edit'),
                'Entity' => trans_choice('entity.language', 1)
            ]) }}"
    description="{{ __('lang-resources::commons.actions.on_entity', [
                'Action' => __('lang-resources::commons.actions.edit'),
                'Entity' => trans_choice('entity.language', 1)
            ]) }}" section="">

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
            @include('admin::language.section.box-info', ['page' => 'edit'])
        </div>
        <div class="col-md-9">
            <form method="post" action="{{ route('app.admin.languages.update', ['id' =>$language ->_id])}}" class="card"
                data-parsley-validate enctype="multipart/form-data">
            
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            {{ __('lang-resources::commons.actions.on_entity', [
                            'Action' => __('lang-resources::commons.actions.edit'),
                            'Entity' => trans_choice('entity.language', 1)
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
                    @include('admin::language.section.form')
                </div>
            </form>
        </div>
    </div>

    <x-customponents-section name="logged_scripts">
        <script>
            ClassicEditor.create( document.querySelector( '#description' ), {
                    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                    } ).then( editor => {
                        window.editor = editor;
                    } ).catch( err => {
                        console.error( err.stack );
                    } );
        </script>
    </x-customponents-section>
</x-admin::layouts.logged>