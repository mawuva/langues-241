
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-info-circle"></i>
            <b>{{ trans_choice('entity.level', 1) }} :</b> {{ $level ->name }}
        </h3>
    </div>
    <div class="card-body">
        <dl>
            <dt>{{ __('lang-resources::commons.attributes.name') }}</dt>
            <dd>{{ $level ->name }}</dd>
            <hr>

            <dt>{{ __('lang-resources::commons.attributes.description') }}</dt>
            <dd>{{ $level ->description }}</dd>
        </dl>
        <hr>
        @if (isset($page) && $page == 'edit')
            <a href="{{ route('app.admin.levels.show', ['id' => $level ->_id]) }}" class="btn btn-sm btn-primary btn-block">
                <i class="fa fa-info-circle"></i>
                {{ __('lang-resources::commons.actions.show') }}
            </a>
        @endif

        @if (isset($page) && $page == 'show')
            <a href="{{ route('app.admin.levels.edit', ['id' => $level ->_id]) }}" class="btn btn-sm btn-warning btn-block">
                <i class="fa fa-pencil-alt"></i>
                {{ __('lang-resources::commons.actions.edit') }}
            </a>
        @endif
    </div>
</div>