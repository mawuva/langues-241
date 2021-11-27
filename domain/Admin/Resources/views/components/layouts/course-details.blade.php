<x-admin::layouts.logged 
    title="{{ trans_choice('entity.course', 1) . ' - ' . $course ->title }}"
    description="{{ trans_choice('entity.course', 1) }}" section="">

    <x-customponents-section name="header_action">
        <a href="{{ route('app.admin.courses.index') }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.course', 2)
            ]) }}
        </a>
        <a href="{{ route('app.admin.courses.create') }}" class="btn btn-sm btn-success">
            {{ __('lang-resources::commons.actions.on_entity', [
            'Action' => __('lang-resources::commons.actions.create'),
            'Entity' => trans_choice('entity.course', 1)
            ]) }}
        </a>
    </x-customponents-section>

    <div class="row">
        <div class="col-md-3">
            @include('admin::course.section.box-info', ['page' => 'show'])
        </div>
        <div class="col-md-9">
            {{ $slot }}
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