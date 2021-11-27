<div class="card card-body box-profile">
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/default/user.png') }}"
            alt="{{ $user ->full_name }}">
    </div>

    <h3 class="profile-username text-center">{{ $user ->full_name }}</h3>

    <!--<p class="text-muted text-center">Software Engineer</p> -->

    <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
            <a href="mailto:{{ $user ->email }}">{{ $user ->email }}</a>
        </li>
        <li class="list-group-item">
            <b>Dernière connexion</b> <br> {{ $user ->last_login_at }}
        </li>
    </ul>
</div>