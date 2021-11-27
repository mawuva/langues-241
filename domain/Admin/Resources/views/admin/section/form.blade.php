
@csrf
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="name">{{ __('lang-resources::commons.attributes.name') }}</label>
            <input type="text" name="name" id="name" autocomplete="off" required
                value="{{ (isset($admin)) ? $admin ->name : old('name') }}"
                class="form-control @error('name') border border-danger @enderror">
            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="first_name">{{ __('lang-resources::commons.attributes.first_name') }}</label>
            <input type="text" name="first_name" id="first_name" autocomplete="off" required
                value="{{ (isset($admin)) ? $admin ->first_name : old('first_name') }}"
                class="form-control @error('first_name') border border-danger @enderror">
            @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label for="email">{{ __('lang-resources::commons.attributes.email') }}</label>
    <input type="email" name="email" id="email" autocomplete="off" required 
        value="{{ (isset($admin)) ? $admin ->email : old('email') }}"
        class="form-control @error('email') border border-danger @enderror">
        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
</div>

@if (!isset($admin))
    <input type="hidden" name="is_admin" value="1">
    <div class="form-group">
        <label for="password">{{ __('lang-resources::commons.attributes.password') }}</label>
        <input type="password" name="password" id="password" autocomplete="off" required
            class="form-control @error('password') border border-danger @enderror">
        @error('password') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">{{ __('lang-resources::commons.attributes.confirm_password') }}</label>
        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" required
            class="form-control @error('password_confirmation') border border-danger @enderror">
        @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror
    </div>    
@endif
