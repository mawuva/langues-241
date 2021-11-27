

@component('admin::components.layouts.course-details', compact('course'))
    <form method="post" action="{{ route('app.admin.courses.update', ['id' =>$course ->_id])}}" class="card"
        data-parsley-validate enctype="multipart/form-data">

        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    {{ __('lang-resources::commons.actions.on_entity', [
                    'Action' => __('lang-resources::commons.actions.edit'),
                    'Entity' => trans_choice('entity.course', 1)
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
            @include('admin::course.section.form')
        </div>
    </form>
@endcomponent
