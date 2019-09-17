@extends('user.app.app')

@section('content')
    <div class="row">
        {{-- хлебные крошки --}}
        <div class="col-12 breadcrumbs mt-3 mb-3">
            <a href="{{ asset(app()->getLocale()) }}">Главная</a>
            <span> > </span>
            <a href="{{ asset(app()->getLocale().'/news') }}">Новости</a>
            <span> > </span>
            <a href="{{ asset(app()->getLocale().'/news/'.$btpost_theme->alias) }}">{{ $btpost_theme->getNameTran() }}</a>
            <span> > </span>
            <a>{{ $btpost->getTitleTran() }}</a>
        </div>
        {{-- список доступных тем новостей --}}
        <div class="col-12 d-f jc-se ai-c t-c mb-3 topicNews">
            @forelse($bthemes as $btheme)
                <a href="{{ asset(app()->getLocale().'/news/'.$btheme->alias) }}">{{ $btheme->getNameTran() }}</a>
            @empty
            @endforelse
        </div>
        {{-- контент новости --}}
        <div class="col-12 mt-3" id="post-content">
            {!! $btpost->getContentTran() !!}
        </div>
    </div>
@endsection

@section('script2')
    <script>
        let postContentImages = $('#post-content').find('img');
        let windowWidth = window.innerWidth;
        postContentImages.each(function (i,e) {
            let imageWidth = $(e).width();
            let imageFloat = $(e).css('float');


            if(imageFloat == 'left'){
                $(e).css({ 'margin-right' : '20px'})
            }else if(imageFloat == 'right'){
                $(e).css({ 'margin-left' : '20px'})
            }

            if(windowWidth < imageWidth){
                $(e).width('100%');
            }

            $(e).unwrap();
        });
    </script>
@endsection
