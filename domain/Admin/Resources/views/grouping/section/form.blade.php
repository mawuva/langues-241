
@csrf
<div class="form-group">
    <label for="name">{{ __('lang-resources::commons.attributes.name') }}</label>
    <input type="text" name="name" id="name" autocomplete="off" required
        value="{{ (isset($grouping)) ? $grouping ->name : old('name') }}"
        class="form-control @error('name') border border-danger @enderror">
    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
</div>
<div class="form-group">
    <label for="description">{{ __('lang-resources::commons.attributes.description') }}</label>
    <textarea name="description" id="description" cols="3" rows="3" autocomplete="off"
            class="form-control @error('description') border border-danger @enderror">
        {{ (isset($grouping)) ? $grouping ->description : old('description') }}
    </textarea>
    @error('description') <p class="text-danger">{{ $message }}</p> @enderror
</div>

