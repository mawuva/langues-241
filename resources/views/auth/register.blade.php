<x-layouts.master title="{{ __('lang-resources::pages.register.title') }}"
    description="{{ __('lang-resources::pages.register.description') }}" section="">

    <section>
        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                    <form method="post" action="{{ route('app.auth.register') }}" data-parsley-validate>
                        @csrf
                        <div class="crs_log_wrap">
                            <div class="crs_log__thumb">
                                <img src="{{ asset('assets/img/banner-2.jpg') }}" class="img-fluid" alt="" />
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-user"></i></div>
                                </div>
    
                                <div class="rcs_log_124">
                                    <div class="Lpo09">
                                        <h4>{{ __('lang-resources::displays.account.create_new') }}</h4>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="first_name">{{ __('lang-resources::commons.attributes.first_name') }}</label>
                                                <input type="text" name="first_name" id="first_name" autocomplete="off" required
                                                    value="{{ old('first_name') }}"
                                                    class="form-control @error('first_name') border border-danger @enderror" />
                                                @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('lang-resources::commons.attributes.last_name') }}</label>
                                                <input type="text" name="name" id="name" autocomplete="off" required
                                                    value="{{ old('name') }}"
                                                    class="form-control @error('name') border border-danger @enderror" />
                                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
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
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">
                                            {{ __('lang-resources::displays.auth.sign_up') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_log__footer d-flex justify-content-between">
                                <div class="fhg_45">
                                    <p class="musrt">
                                        {{ __('lang-resources::displays.account.already_exists') }}
                                        <a href="{{ route('app.auth.login') }}" class="theme-cl">
                                            {{ __('lang-resources::displays.auth.login') }}
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