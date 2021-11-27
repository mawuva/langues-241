@component('admin::components.layouts.course-details', compact('course'))
<div class="row">
    <div class="col-12 col-md-6">
        {{ __('lang-resources::commons.actions.on_entity', [
        'Action' => __('lang-resources::commons.actions.create'),
        'Entity' => trans_choice('entity.chapter', 1)
        ]) }}
    </div>
    <div class="col-12 col-md-6 text-right">
        <a href="{{ route('app.admin.course-chapters.create', ['id' => $course ->id]) }}" class="btn btn-sm btn-success">
            {{ __('lang-resources::commons.actions.on_entity', [
            'Action' => __('lang-resources::commons.actions.create'),
            'Entity' => trans_choice('entity.course', 1)
            ]) }}
        </a>
        <a href="{{ route('app.admin.course-chapters.index', ['id' => $course ->id]) }}" class="btn btn-sm btn-primary">
            {{ trans_choice('lang-resources::commons.actions.back_to', 2, [
            'Destination' => trans_choice('entity.course', 2)
            ]) }}
        </a>
    </div>
</div>
<hr>
@include('admin::course-chapter.section.table', ['displayed' => 'deleted'])
@endcomponent