
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-info-circle"></i>
            <b>{{ trans_choice('entity.content_type', 1) }} :</b> {{ $contentType ->name }}
        </h3>
    </div>
    <div class="card-body">
        <dl>
            <dt>{{ __('lang-resources::commons.attributes.name') }}</dt>
            <dd>{{ $contentType ->name }}</dd>
            <hr>

            <dt>{{ __('lang-resources::commons.attributes.description') }}</dt>
            <dd>{{ $contentType ->description }}</dd>
        </dl>
        <hr>
        @if (isset($page) && $page == 'edit')
            <a href="{{ route('app.admin.content-types.show', ['id' => $contentType ->_id]) }}" class="btn btn-sm btn-primary btn-block">
                <i class="fa fa-info-circle"></i>
                {{ __('lang-resources::commons.actions.show') }}
            </a>
        @endif

        @if (isset($page) && $page == 'show')
            <a href="{{ route('app.admin.content-types.edit', ['id' => $contentType ->_id]) }}" class="btn btn-sm btn-warning btn-block">
                <i class="fa fa-pencil-alt"></i>
                {{ __('lang-resources::commons.actions.edit') }}
            </a>
        @endif
    </div>
</div>