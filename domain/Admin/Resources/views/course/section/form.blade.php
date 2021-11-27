
@csrf
<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        <div class="form-group">
            <label for="title">{{ __('lang-resources::commons.attributes.title') }}</label>
            <input type="text" name="title" id="title" autocomplete="off" required
                value="{{ (isset($course)) ? $course ->title : old('title') }}"
                class="form-control @error('title') border border-danger @enderror">
            @error('title') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="fee">{{ __('displays.attributes.fee') }}</label>
                    <input type="number" name="fee" id="fee" autocomplete="off" required
                        value="{{ (isset($course)) ? $course ->fee : old('fee') }}"
                        class="form-control @error('fee') border border-danger @enderror">
                    @error('fee') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="language">{{ trans_choice('entity.language', 1) }}</label>
                    <select name="language" id="language" class="form-control @error('language') border border-danger @enderror">
                        <option value="">{{ __('displays.no_selection') }}</option>
                        @foreach ($languages as $language)
                            <option @if ((isset($course)) && $course->language_id === $language->id)
                                {{ 'selected' }}
                                @elseif (old('language') === $language->id)
                                    {{ 'selected' }}
                                @endif value="{{ $language ->id }}">{{ $language ->name }}</option>
                        @endforeach
                    </select>
                    @error('language') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="level">{{ trans_choice('entity.level', 1) }}</label>
                    <select name="level" id="level" class="form-control @error('level') border border-danger @enderror">
                        <option value="">{{ __('displays.no_selection') }}</option>
                        @foreach ($levels as $level)
                            <option @if ((isset($course)) && $course->level_id === $level->id)
                                    {{ 'selected' }}
                                @elseif (old('level') === $level->id)
                                    {{ 'selected' }}
                                @endif value="{{ $level ->id }}">{{ $level ->name }}</option>
                        @endforeach
                    </select>
                    @error('level') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="category">{{ trans_choice('entity.category', 1) }}</label>
                    <select name="category" id="category" class="form-control @error('category') border border-danger @enderror">
                        <option value="">{{ __('displays.no_selection') }}</option>
                        @foreach ($groupings as $grouping)
                            <option @if ((isset($course)) && $course->grouping_id === $grouping->id)
                                    {{ 'selected' }}
                                @elseif (old('category') === $grouping->id)
                                    {{ 'selected' }}
                                @endif value="{{ $grouping ->id }}">{{ $grouping ->name }}</option>
                        @endforeach
                    </select>
                    @error('category') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="short_description">{{ __('displays.attributes.short_description') }}</label>
            <textarea name="short_description" id="short_description" cols="3" rows="3" autocomplete="off"
                class="form-control @error('short_description') border border-danger @enderror">
                        {{ (isset($course)) ? $course ->short_description : old('short_description') }}
                    </textarea>
            @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label for="description">{{ __('lang-resources::commons.attributes.description') }}</label>
            <textarea name="description" id="description" 
                class="form-control @error('description') border border-danger @enderror">
                {{ (isset($course)) ? $course ->description : old('description') }}
            </textarea>
            @error('description') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
    </div>
    <div class="col-12 col-md-4 text-center">
        @if ((isset($course) && $course ->image !== null))
            <img src="{{ ($course ->image !== null) ? asset('storage/'.$course ->image ->url_lg) : asset('images/default/course.png') }}"
                id="image_show" class="img-fluid img-thumbnail" alt="{{ $course ->slug }}" title="{{ $course ->name }}">

            <div class="form-group" id="image_uploading" style="display: none">
                <div class="file-loading">
                    <label>Preview File Icon</label>
                    <input id="file-3" type="file" name="image">
                </div>
                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <span id="btn_change" class="btn btn-sm btn-block btn-primary mt-2" onclick="myFunction()">
                {{ __('displays.change_image') }}
            </span>
            <span id="btn_cancel" class="btn btn-sm btn-block btn-danger mt-2" style="display:none" onclick="myFunction()">
                {{ __('displays.cancel_change') }}
            </span>
        @else
            <div class="form-group" id="image_uploading">
                <div class="file-loading">
                    <label>Preview File Icon</label>
                    <input id="file-3" type="file" name="image">
                </div>
                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
        @endif
    </div>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("image_uploading");
        var y = document.getElementById("image_show");
        var z = document.getElementById("btn_change");
        var o = document.getElementById("btn_cancel");

        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

        if (y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }

        if (z.style.display === "none") {
            z.style.display = "block";
        } else {
            z.style.display = "none";
        }

        if (o.style.display === "none") {
            o.style.display = "block";
        } else {
            o.style.display = "none";
        }
    }
</script>
