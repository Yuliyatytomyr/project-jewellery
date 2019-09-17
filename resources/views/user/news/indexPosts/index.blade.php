@extends('user.app.app')

@section('content')
    <div class="row">

        {{-- Название страницы --}}
        <h3 class="w-100 text-center m-3">{{ $title }}</h3>

        {{-- список доступных тем новостей --}}
        <div class="col-12 d-f jc-se ai-c t-c mb-3 topicNews">
            @forelse($bthemes as $btheme)
                <a href="{{ asset(app()->getLocale().'/news/'.$btheme->alias) }}">{{ $btheme->getNameTran() }}</a>
            @empty
                {{-- если тем новостей нет --}}
            @endforelse
        </div>

        {{-- блок с карточками новостей --}}
        <div class="col-12" id="block-posts">
            <div class="row">
                @forelse($btposts as $btpost)
                    {{-- карточка новости --}}
                    <div class="col-12 mt-3 mb-3">
                        <div class="row">
                            {{-- изображение новости --}}
                            <div class="col-12 col-md-5 newsImage" style="background: url('{{ asset($btpost->image_path) }}') "></div>
                            <div class="col-12 col-md-7 p-5 newsArticle">
                                <div class="row">
                                    {{-- заголовок новсти --}}
                                    <div class="col-12">
                                        <h4>{{ $btpost->getTitleTran() }}</h4>
                                    </div>

                                    {{-- краткое описание новости --}}
                                    <div class="col-12">
                                        {{ $btpost->getSDescTran() }}
                                    </div>
                                    {{-- дата новости --}}
                                    <div class="dateNews col-12 mt-2">
                                        02.09.2019
                                    </div>
                                    {{-- ссылка на новость --}}
                                    <div class="col-12 mt-3">
                                        <a href="{{ asset(app()->getLocale().'/news/'.$btpost->btheme->alias.'/'.$btpost->alias) }}">Читать больше -></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12 t-c mb-3">
                        <h4>Новостей нет</h4>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- пагинация по страницам (появляется только тогда, когда новостей больше 10шт) --}}
        <div class="col-12" id="block-pagination">
            {{ $btposts->links() }}
        </div>
    </div>
@endsection