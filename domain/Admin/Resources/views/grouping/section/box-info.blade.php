
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-info-circle"></i>
            <b>{{ trans_choice('entity.category', 1) }} :</b> {{ $grouping ->name }}
        </h3>
    </div>
    <div class="card-body">
        <dl>
            <dt>{{ __('lang-resources::commons.attributes.name') }}</dt>
            <dd>{{ $grouping ->name }}</dd>
            <hr>

            <dt>{{ __('lang-resources::commons.attributes.description') }}</dt>
            <dd>{{ $grouping ->description }}</dd>
        </dl>
        <hr>
        @if (isset($page) && $page == 'edit')
            <a href="{{ route('app.admin.groupings.show', ['id' => $grouping ->_id]) }}" class="btn btn-sm btn-primary btn-block">
                <i class="fa fa-info-circle"></i>
                {{ __('lang-resources::commons.actions.show') }}
            </a>
        @endif

        @if (isset($page) && $page == 'show')
            <a href="{{ route('app.admin.groupings.edit', ['id' => $grouping ->_id]) }}" class="btn btn-sm btn-warning btn-block">
                <i class="fa fa-pencil-alt"></i>
                {{ __('lang-resources::commons.actions.edit') }}
            </a>
        @endif
    </div>
</div>