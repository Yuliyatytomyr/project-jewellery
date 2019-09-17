@if($gproduct->category->size_array != null)
    <?
        $array_cat_sizes = json_decode($gproduct->category->size_array);
    ?>
    <div class="size-select_txt mt-3 mb-2">
        Размеры
    </div>
    <div class="size-select_label">
        <form>
            <ul id="size-select_label" class="options-list" data-productid="">
                @foreach($array_cat_sizes as $key => $array_cat_size)
                    <li>
                        <input type="radio" class="@if(!in_array($array_cat_size, $sizes_avail_products)) not-available @endif product-custom-prodoption" name="radio-size" id="options_size_{{ $key }}" value="{{ $array_cat_size }}">
                        <label class="d-f ai-c jc-c mr-4 mt-2" for="options_size_{{ $key }}">{{ $array_cat_size }}</label>
                    </li>
                @endforeach
            </ul>
        </form>
    </div>
    <div class="d-f ai-c mt-2 mb-md-2">
            <button class="cl-g cl-w btn-profile_border mt-2 mt-md-0" href="#" data-toggle="modal" data-target="">Узнать свой размер</button>
{{--            <a class="cl-g" href="#" data-toggle="modal" data-target="">--}}
{{--                Узнать свой размер--}}
{{--            </a>--}}
    </div>
@endif