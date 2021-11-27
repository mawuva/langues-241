
<div class="card box-profile">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-info-circle"></i>
            <b>{{ trans_choice('entity.course', 1) }} :</b> {{ $course ->title }}
        </h3>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img src="{{ ($course ->image !== null) ? asset('storage/'.$course ->image ->url_md) : asset('images/default/course.png') }}" 
                        class="profile-user-img img-fluid img-circle"
                        alt="{{ $course ->slug }}"
                        title="{{ $course ->name }}">
        </div>
        <hr>
        <dl>
            <dt>{{ __('lang-resources::commons.attributes.title') }}</dt>
            <dd>{{ $course ->title }}</dd>
            <hr>

            <dt>{{ trans_choice('entity.language', 1) }}</dt>
            <dd>
                <a class="btn btn-sm btn-outline-primary"
                    href="{{ route('app.admin.languages.show', ['id' => $course ->language ->_id]) }}">
                    {{ $course ->language ->name }}
                </a>
            </dd>
            <hr>

            <dt>{{ trans_choice('entity.level', 1) }}</dt>
            <dd>
                <a class="btn btn-sm btn-outline-success" 
                    href="{{ route('app.admin.levels.show', ['id' => $course ->level ->_id]) }}">
                    {{ $course ->level ->name }}
                </a>
            </dd>
            <hr>

            <dt>{{ trans_choice('entity.category', 1) }}</dt>
            <dd>
                <a class="btn btn-sm btn-outline-dark" 
                    href="{{ route('app.admin.groupings.show', ['id' => $course ->grouping ->_id]) }}">
                    {{ $course ->grouping ->name }}
                </a>
            </dd>
            <hr>

            <dt>{{ __('displays.attributes.short_description') }}</dt>
            <dd>{!! $course ->short_description !!}</dd>
            <hr>

            <dt>{{ __('lang-resources::commons.attributes.description') }}</dt>
            <dd>{!! $course ->description !!}</dd>
        </dl>
        <hr>
        @if (isset($page) && $page == 'edit')
            <a href="{{ route('app.admin.courses.show', ['id' => $course ->_id]) }}" class="btn btn-sm btn-primary btn-block">
                <i class="fa fa-info-circle"></i>
                {{ __('lang-resources::commons.actions.show') }}
            </a>
        @endif

        @if (isset($page) && $page == 'show')
            <a href="{{ route('app.admin.courses.edit', ['id' => $course ->_id]) }}" class="btn btn-sm btn-warning btn-block">
                <i class="fa fa-pencil-alt"></i>
                {{ __('lang-resources::commons.actions.edit') }}
            </a>
        @endif
    </div>
</div>