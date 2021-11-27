
@if ($courses !== null && $courses ->count() !== 0)
    <table class="table table-bordered table-hover" id="dt">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('lang-resources::commons.attributes.title') }}</th>
            <th>{{ __('displays.attributes.fee') }}</th>
            <th>{{ trans_choice('entity.language', 1) }}</th>
            <th>{{ trans_choice('entity.level', 1) }}</th>
            <th>{{ trans_choice('entity.category', 1) }}</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $data)
            <tr>
                <td>
                    <img src="{{ ($data ->image !== null) ? asset('storage/'.$data ->image ->url_sm) : asset('images/default/course.png') }}" 
                        class="img-fluid img-thumbnail" width="75"
                        alt="{{ $data ->slug }}"
                        title="{{ $data ->name }}">
                </td>
                <td>{{ $data ->title }}</td>
                <td>{{ number_format($data ->fee, 0, '.', ',') }}</td>
                <td>
                    @if ($data ->language !== null)
                        <a class="btn btn-sm amber" href="{{ route('app.admin.languages.show', ['id' => $data ->language ->_id]) }}">
                            {{ $data ->language ->name }}
                        </a>
                    @else
                        <span class="btn btn-sm btn-outline-secondary">
                            {{ __('displays.no') }} {{ trans_choice('entity.language', 1) }}
                        </span>
                    @endif
                </td>
                <td>
                    @if ($data ->level !== null)
                        <a class="btn btn-sm indigo darken-2 white-text" href="{{ route('app.admin.levels.show', ['id' => $data ->level ->_id]) }}">
                            {{ $data ->level ->name }}
                        </a>
                    @else
                        <span class="btn btn-sm btn-outline-secondary">
                            {{ __('displays.no') }} {{ trans_choice('entity.level', 1) }}
                        </span>
                    @endif
                </td>
                <td>
                    @if ($data ->grouping !== null)
                        <a class="btn btn-sm red darken-3 white-text" href="{{ route('app.admin.groupings.show', ['id' => $data ->grouping ->_id]) }}">
                            {{ $data ->grouping ->name }}
                        </a>
                    @else
                        <span class="btn btn-sm btn-outline-secondary">
                            {{ __('displays.no') }} {{ trans_choice('entity.category', 1) }}
                        </span>
                    @endif
                </td>
                <td>
                    @if ($displayed === 'deleted')
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.restore') }}" 
                            href="{{ route('app.admin.courses.restore', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm deep-purple darken-3 white-text">
                            <i class="fa fa-fw fa-recycle"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.delete_permanently') }}"
                            href="{{ route('app.admin.courses.remove', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm deep-orange darken-4 white-text">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                    @else
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.show') }}" 
                            href="{{ route('app.admin.courses.show', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-info">
                            <i class="fa fa-fw fa-info-circle"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.edit') }}"
                            href="{{ route('app.admin.courses.edit', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-warning">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.delete') }}"
                            href="{{ route('app.admin.courses.delete', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-danger">
                            <i class="fa fa-fw fa-trash-alt"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ trans_choice('entity.chapter', 2) }}"
                            href="{{ route('app.admin.course-chapters.index', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm purple darken-3 white-text">
                            <i class="fa fa-fw fa-th-list"></i>
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