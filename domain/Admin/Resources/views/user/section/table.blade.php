
@if ($users !== null && $users ->count() !== 0)
    <table class="table table-bordered table-hover" id="dt">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('lang-resources::commons.attributes.name') }}</th>
            <th>{{ __('lang-resources::commons.attributes.email') }}</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $data)
            <tr>
                <td>
                    <img src="{{ asset('images/default/user.png') }}" width="28" class="img-circle img-fluid elevation-2" alt="{{ $data ->full_name }}">
                </td>
                <td>{{ $data ->full_name }}</td>
                <td>
                    <a href="mailto:{{ $data ->email }}">{{ $data ->email }}</a>
                </td>
                <td>
                    @if ($displayed === 'deleted')
                        
                    @else
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('lang-resources::commons.actions.show') }}" 
                            href="{{ route('app.admin.users.show', ['id' => $data ->_id]) }}" 
                            class="btn btn-sm btn-info">
                            <i class="fa fa-fw fa-info-circle"></i>
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