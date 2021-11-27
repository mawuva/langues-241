
@csrf
<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        <div class="form-group">
            <label for="name">{{ __('lang-resources::commons.attributes.name') }}</label>
            <input type="text" name="name" id="name" autocomplete="off" required
                value="{{ (isset($language)) ? $language ->name : old('name') }}"
                class="form-control @error('name') border border-danger @enderror">
            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label for="short_description">{{ __('displays.attributes.short_description') }}</label>
            <textarea name="short_description" id="short_description" cols="3" rows="3" autocomplete="off"
                class="form-control @error('short_description') border border-danger @enderror">
                        {{ (isset($language)) ? $language ->short_description : old('short_description') }}
                    </textarea>
            @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label for="description">{{ __('lang-resources::commons.attributes.description') }}</label>
            <textarea name="description" id="description" 
                class="form-control @error('description') border border-danger @enderror">
                {{ (isset($language)) ? $language ->description : old('description') }}
            </textarea>
            @error('description') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
    </div>
    <div class="col-12 col-md-4 text-center">
        @if ((isset($language) && $language ->image !== null))
            <img src="{{ ($language ->image !== null) ? asset('storage/'.$language ->image ->url_lg) : asset('images/default/language.png') }}"
                id="image_show" class="img-fluid img-thumbnail" alt="{{ $language ->slug }}" title="{{ $language ->name }}">

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
