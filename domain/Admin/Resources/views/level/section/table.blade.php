
@if ($levels !== null && $levels ->count() !== 0)
    <table class="table table-bordered table-hover" id="dt">
    <thead>
        <tr>
            <th>{{ __('lang-resources::commons.attributes.name') }}</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($levels as $data)
            <tr>
                <td>{{ $data ->name }}</td>
                <td>
                    @if ($displayed === 'deleted')
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.restore') }}" 
                            href="{{ route('app.admin.levels.restore', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm deep-purple darken-3 white-text">
                            <i class="fa fa-fw fa-recycle"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.delete_permanently') }}"
                            href="{{ route('app.admin.levels.remove', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm deep-orange darken-4 white-text">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                    @else
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.show') }}" 
                            href="{{ route('app.admin.levels.show', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-info">
                            <i class="fa fa-fw fa-info-circle"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.edit') }}"
                            href="{{ route('app.admin.levels.edit', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-warning">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.delete') }}"
                            href="{{ route('app.admin.levels.delete', ['id' => $data ->_id]) }}" 
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