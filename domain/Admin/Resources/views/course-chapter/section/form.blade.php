@csrf
<div class="form-group">
    <label for="title">{{ __('lang-resources::commons.attributes.title') }}</label>
    <input type="text" name="title" id="title" autocomplete="off" required
        value="{{ (isset($chapter)) ? $chapter ->title : old('title') }}"
        class="form-control @error('name') border border-danger @enderror">
    @error('title') <p class="text-danger">{{ $message }}</p> @enderror
</div>
<div class="form-group">
    <label for="name">{{ trans_choice('entity.course', 1) }}</label>
    <input type="text" class="form-control" value="{{ $course ->title }}" disabled>
    @error('course') <p class="text-danger">{{ $message }}</p> @enderror
</div>
<input type="hidden" name="course" value="{{ $course ->id }}">
<div class="form-group">
    <label for="level">{{ trans_choice('entity.level', 1) }}</label>
    <select name="level" id="level" class="form-control @error('level') border border-danger @enderror">
        <option value="">{{ __('displays.no_selection') }}</option>
        @foreach ($levels as $level)
        <option @if ((isset($chapter)) && $chapter->level_id === $level->id)
            {{ 'selected' }}
            @elseif (old('level') === $level->id)
            {{ 'selected' }}
            @endif value="{{ $level ->id }}">{{ $level ->name }}</option>
        @endforeach
    </select>
    @error('level') <p class="text-danger">{{ $message }}</p> @enderror
</div>
<div class="form-group">
    <label for="description">{{ __('lang-resources::commons.attributes.description') }}</label>
    <textarea name="description" id="description" cols="3" rows="3" autocomplete="off"
        class="form-control @error('description') border border-danger @enderror">
        {{ (isset($chapter)) ? $chapter ->description : old('description') }}
    </textarea>
    @error('description') <p class="text-danger">{{ $message }}</p> @enderror
</div>