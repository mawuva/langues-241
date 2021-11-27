<x-admin::layouts.master 
        title="{{ __('lang-resources::pages.login.title') }}" 
        description="{{ __('lang-resources::pages.login.description') }}">

    <div class="hold-transition login-page">
        <x:notiflash-messages />
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h4">{{ config('app.name') }} - Administration</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
        
                    <form action="{{ route('app.admin.auth.login') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" name="identifiant" class="form-control @error('identifiant') border border-danger @enderror" 
                                    placeholder="{{ __('lang-resources::commons.attributes.email') }}" autocomplete="off" required
                                    value="{{ old('identifiant') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('identifiant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control @error('password') border border-danger @enderror" 
                                placeholder="{{ __('lang-resources::commons.attributes.password') }}" autocomplete="off" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('lang-resources::displays.auth.sign_in') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin::layouts.master>