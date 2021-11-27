<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content overli" id="loginmodal">
            <div class="modal-header">
                <h5 class="modal-title">Login Your Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form method="post" action="{{ route('app.auth.login') }}" data-parsley-validate>
                        <div class="form-group">
                            <label>{{ __('lang-resources::commons.attributes.email') }}</label>
                            <div class="input-with-icon">
                                <input type="text" class="form-control" placeholder="User or email">
                                <i class="ti-user"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-with-icon">
                                <input type="password" class="form-control" placeholder="*******">
                                <i class="ti-unlock"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width theme-bg text-white">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="crs_log__footer d-flex justify-content-between mt-0">
                <div class="fhg_45">
                    <p class="musrt">Don't have account? <a href="{{ route('app.auth.register') }}" class="theme-cl">SignUp</a></p>
                </div>
                <div class="fhg_45">
                    <p class="musrt"><a href="forgot.html" class="text-danger">Forgot Password?</a></p>
                </div>
            </div>
        </div>
    </div>
</div>