<div class="card card-body box-profile">
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/default/user.png') }}"
            alt="{{ $admin ->full_name }}">
    </div>

    <h3 class="profile-username text-center">{{ $admin ->full_name }}</h3>

    <!--<p class="text-muted text-center">Software Engineer</p> -->

    <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
            <a href="mailto:{{ $admin ->email }}">{{ $admin ->email }}</a>
        </li>
        <li class="list-group-item">
            <b>Dernière connexion</b> <br> {{ $admin ->last_login_at }}
        </li>
    </ul>

    @if (isset($page) && $page == 'edit')
        <a href="{{ route('app.admin.admins.show', ['id' => $admin ->_id]) }}" class="btn btn-sm btn-primary btn-block">
            <i class="fa fa-info-circle"></i>
            {{ __('lang-resources::commons.actions.show') }}
        </a>
    @endif

    @if (isset($page) && $page == 'show')
        <a href="{{ route('app.admin.admins.edit', ['id' => $admin ->_id]) }}" class="btn btn-sm btn-warning btn-block">
            <i class="fa fa-pencil-alt"></i>
            {{ __('lang-resources::commons.actions.edit') }}
        </a>
    @endif
</div>