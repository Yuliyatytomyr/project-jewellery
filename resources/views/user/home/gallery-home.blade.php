<div class="gallery-home mt-3">
    @forelse($mozaiks->chunk(2) as $key => $chunks)
        <div class="row pb-2">
            @foreach($chunks as $key2 =>$mozaik)
                @if($mozaik -> show_on == 0)
                    <div class="col-5 @if($key == 1) pr-0 @else pr-0 @endif">
                        <a href="{{ $mozaik -> link}}">
                            <img class="w-1p h-1p" src="{{ asset($mozaik -> image_thumb) }}" alt="{{ $mozaik -> alt}}" class="thumb">
                            <div class="gallery-home_txt-img p-a cl-w @if(in_array($key2, [0,2,4])) left @endif">{{ $mozaik -> getNameTran() }}</div>
                        </a>
                    </div>
                @elseif($mozaik -> show_on == 1)
                    <div class="col-7 @if($key == 1) pr-0 @else pr-0 @endif">
                        <a href="{{ $mozaik -> link}}">
                            <img class="w-1p h-1p" src="{{ asset($mozaik -> image_full) }}" alt="{{ $mozaik -> alt}}" class="thumb">
                            <div class="gallery-home_txt-img p-a cl-w @if(in_array($key2, [0,2,4])) left @endif">{{ $mozaik -> getNameTran() }}</div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    @empty
    @endforelse
</div>