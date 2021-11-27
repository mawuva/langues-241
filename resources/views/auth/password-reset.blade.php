<x-layouts.master title="{{ __('pages.password_reset.title') }}"
    description="{{ __('pages.password_reset.description') }}" section="">

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <form method="post" action="{{ route('app.password.update') }}" data-parsley-validate>
                    @csrf
                    <div class="crs_log_wrap">
                        <div class="crs_log__thumb">
                            <img src="{{ asset('assets/img/banner-2.jpg') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="crs_log__caption">
                            <div class="rcs_log_123">
                                <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                            </div>

                            <div class="rcs_log_124">
                                <div class="Lpo09">
                                    <h4>{{ __('lang-resources::displays.account.password_reset') }}</h4>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('lang-resources::commons.attributes.email') }}</label>
                                    <input type="email" name="email" id="email" autocomplete="off" required
                                        value="{{ old('email') }}"
                                        class="form-control @error('email') border border-danger @enderror">
                                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('lang-resources::commons.attributes.password') }}</label>
                                    <input type="password" name="password" id="password" autocomplete="off" required
                                        class="form-control @error('password') border border-danger @enderror">
                                    @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('lang-resources::commons.attributes.password_confirmation') }}</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" required
                                        class="form-control @error('password_confirmation') border border-danger @enderror">
                                    @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn full-width btn-md theme-bg text-white">
                                        {{ __('lang-resources::displays.account.forgot_password') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="crs_log__footer d-flex justify-content-between">
                            <div class="fhg_45">
                                <p class="musrt">
                                    {{ __('lang-resources::displays.account.does_not_exist') }}
                                    <a href="{{ route('app.auth.register') }}" class="theme-cl">
                                        {{ __('lang-resources::displays.auth.sign_up') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

</x-layouts.master>