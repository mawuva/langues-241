
<div class="card box-profile">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-info-circle"></i>
            <b>{{ trans_choice('entity.language', 1) }} :</b> {{ $language ->name }}
        </h3>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img src="{{ ($language ->image !== null) ? asset('storage/'.$language ->image ->url_md) : asset('images/default/language.png') }}" 
                        class="profile-user-img img-fluid img-circle"
                        alt="{{ $language ->slug }}"
                        title="{{ $language ->name }}">
        </div>
        <hr>
        <dl>
            <dt>{{ __('lang-resources::commons.attributes.name') }}</dt>
            <dd>{{ $language ->name }}</dd>
            <hr>

            <dt>{{ __('displays.attributes.short_description') }}</dt>
            <dd>{!! $language ->short_description !!}</dd>
            <hr>

            <dt>{{ __('lang-resources::commons.attributes.description') }}</dt>
            <dd>{!! $language ->description !!}</dd>
        </dl>
        <hr>
        @if (isset($page) && $page == 'edit')
            <a href="{{ route('app.admin.languages.show', ['id' => $language ->_id]) }}" class="btn btn-sm btn-primary btn-block">
                <i class="fa fa-info-circle"></i>
                {{ __('lang-resources::commons.actions.show') }}
            </a>
        @endif

        @if (isset($page) && $page == 'show')
            <a href="{{ route('app.admin.languages.edit', ['id' => $language ->_id]) }}" class="btn btn-sm btn-warning btn-block">
                <i class="fa fa-pencil-alt"></i>
                {{ __('lang-resources::commons.actions.edit') }}
            </a>
        @endif
    </div>
</div>