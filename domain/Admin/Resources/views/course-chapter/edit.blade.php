
@component('admin::components.layouts.course-details', compact('course'))
    <div class="row">
        <div class="col-12 col-md-6">
            {{ __('lang-resources::commons.actions.on_entity', [
            'Action' => __('lang-resources::commons.actions.create'),
            'Entity' => trans_choice('entity.chapter', 1)
            ]) }}
        </div>
        <div class="col-12 col-md-6 text-right">
            <a href="{{ route('app.admin.course-chapters.index', ['id' => $course ->id]) }}" class="btn btn-sm btn-primary">
                {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
                'Destination' => trans_choice('entity.chapter', 2)
                ]) }}
            </a>
            <a href="{{ route('app.admin.course-chapters.deleted', ['id' => $course ->id]) }}" class="btn btn-sm btn-dark">
                {{ trans_choice('lang-resources::commons.actions.show_deleted_entity', 2, [
                'Entity' => trans_choice('entity.chapter', 2)
                ]) }}
            </a>
        </div>
    </div>
    <hr>
    

    <form method="post" action="{{ route('app.admin.course-chapters.edit', ['id' => $course ->id, 'chapter_id' =>$chapter ->_id]) }}" class="card" data-parsley-validate>
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    {{ __('lang-resources::commons.actions.on_entity', [
                    'Action' => __('lang-resources::commons.actions.create'),
                    'Entity' => trans_choice('entity.chapter', 1)
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
            @include('admin::course-chapter.section.form')
        </div>
    </form>
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
@endcomponent