
@if ($chapters !== null && $chapters ->count() !== 0)
    <table class="table table-bordered table-hover" id="dt">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('lang-resources::commons.attributes.title') }}</th>
            <th>{{ trans_choice('entity.level', 1) }}</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($chapters as $data)
            <tr>
                <td>{{ $data ->id }}</td>
                <td>{{ $data ->title }}</td>
                <td>
                    @if ($data ->level !== null)
                        <a class="btn btn-sm btn-outline-success" href="{{ route('app.admin.levels.show', ['id' => $data ->level ->_id]) }}">
                            {{ $data ->level ->name }}
                        </a>
                    @else
                        <span class="btn btn-sm btn-outline-secondary">
                            {{ __('displays.no') }} {{ trans_choice('entity.level', 1) }}
                        </span>
                    @endif
                </td>
                <td>
                    @if ($displayed === 'deleted')
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.restore') }}" 
                            href="{{ route('app.admin.course-chapters.restore', ['id' => $data ->course ->_id, 'chapter_id' => $data ->_id]) }}" 
                            class="btn btn-sm deep-purple darken-3 white-text">
                            <i class="fa fa-fw fa-recycle"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.delete_permanently') }}"
                            href="{{ route('app.admin.course-chapters.remove', ['id' => $data ->course ->_id, 'chapter_id' => $data ->_id]) }}" 
                            class="btn btn-sm deep-orange darken-4 white-text">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                    @else
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.show') }}" 
                            href="{{ route('app.admin.course-chapters.show', ['id' => $data ->course ->_id, 'chapter_id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-info">
                            <i class="fa fa-fw fa-info-circle"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.edit') }}"
                            href="{{ route('app.admin.course-chapters.edit', ['id' => $data ->course ->_id, 'chapter_id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-warning">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.delete') }}"
                            href="{{ route('app.admin.course-chapters.delete', ['id' => $data ->course ->_id, 'chapter_id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-danger">
                            <i class="fa fa-fw fa-trash-alt"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    @if (isset($displayed) && $displayed === 'deleted')
        {{ __('lang-resources::commons.messages.records.not_found_trashed') }}
    @else
        {{ __('lang-resources::commons.messages.records.not_available') }}
    @endif
@endif