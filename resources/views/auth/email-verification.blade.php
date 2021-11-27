<x-layouts.master title="{{ __('lang-resources::pages.login.title') }}"
    description="{{ __('lang-resources::pages.login.description') }}" section="">

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">
                    <br><br><br>
                    <div class="card card-body">
                        <small>{{ config('app.name') }}</small>
                        <br>

                        <h1 class="card-title">Verify your email</h1>
                
                        <p class="card-text mt-3">

                            {!! __('displays.email_verification.greetings', ['Name' => auth() ->user() ->full_name]) !!}
                            <br><br>

                            {!! __('displays.email_verification.we_have_sent_an_email', ['email' => auth() ->user() ->email]) !!}
                            <br><br>

                            {{ __('displays.email_verification.verify_to_continue') }} <br>
                            {!! __('displays.email_verification.check_in_spam') !!} <br>
                            {{ __('displays.email_verification.click_resend_button') }} <br>
                        </p>
                
                        <br>
                        <form action="{{ route('app.verification.request') }}" method="post">
                            @csrf
                            <button class="btn theme-bg text-white" type="submit">
                                {{ __('displays.email_verification.resend_link') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.master>