<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic" rel="stylesheet">

    <title>{{ $title ?? 'silver style' }}</title>

    @section('stylesheet')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @show

{{--    <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>--}}

    @section('script1')
        <script>
            const baseUrl = "{{ url('/') }}";
            const baseLocale = "{{app()->getLocale()}}";
        </script>
        <script src="{{ asset('/js/manifest.js') }}"></script>
        <script src="{{ asset('/js/vendor.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>

    @show

</head>
    <body>
        <div class="holder">
            <div class="preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
    {{--/preloader--}}

        <div id="app">

            @include('user.app.layouts.nav')

            <div class="container">
                <div class="row">
                    <main class="col-12">
                        @yield('content')
                    </main>
                </div>
            </div>

            @include('user.app.layouts.footer')

        </div>

            @include('user.app.layouts.auth_modals')


        @yield('script2')

        <script src="{{ asset('/js/favorites.js') }}"></script>

        @include('user.app.layouts.session_alerts')



{{--    GeoLocation--}}
        {{--    <body onload="getLocation()">--}}
        {{--    <form action="HelloWorld" method="post">--}}
        {{--        <input id="idLatitude"  type="text" name="strLatitude">--}}
        {{--        <input id="idLongitude" type="text" name="strLongitude">--}}

        {{--    </form>--}}


    <script>
        
        $('body').on('keydown', '.search', function (event) {
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        $("body").on('keyup', '.search-toggle', function (e){

            let number = $(this).val().length;
            let toggleBlock = $(this).data('block');
            let url = $(this).data('url');
            let formData = new FormData();
            let token = $('meta[name="csrf-token"]').attr('content');
            formData.append('search', $(this).val());
            formData.append('_token', token);

            if(number > 2 && e.keyCode == 13){
                let form = $('#'+$(this).attr('form'));
                form.submit();
            }else if(number <= 2 && e.keyCode == 13) {
                toastr.info('Укажите больше символов!');
            }else{
                if (number > 2){
                    $("#"+toggleBlock).removeClass('hideSearchBlock');

                    sendAction(url, formData, (data) => {
                        $("#"+toggleBlock).html(data.render);
                    });
                }
                else{
                    $("#"+toggleBlock).addClass('hideSearchBlock')
                }
            }

            $(this).click(function() {
                number = $(this).val().length;

                if (number > 2){
                    $("#"+toggleBlock).removeClass('hideSearchBlock')
                }
            });
        });

        $('body').on('click', '.search-iconMob', function (e) {
            let input = $('#searchMob');
            let number = input.val().length;
            if(number > 2){
                let form = $('#'+input.attr('form'));
                form.submit();
            }
        });
        // Для определения длинны и ширины, если понадобится
        // function getLocation() {
        //     if (navigator.geolocation) {
        //         navigator.geolocation.getCurrentPosition(showPosition);
        //     } else {
        //         alert("Geolocation is not supported by this browser.");
        //     }
        //
        // }
        // function showPosition(position) {
        //     document.getElementById('idLatitude').value = position.coords.latitude;
        //     document.getElementById('idLongitude').value = position.coords.longitude;
        // }


        function position(pos){

            var misto=[
                {name:"@lang('city_name.city1')",lat: 50.45000 , lon: 30.52333 },
                {name:"@lang('city_name.city2')", lat: 49.23278 , lon: 28.46806},
                {name:"@lang('city_name.city3')", lat: 48.45000, lon: 34.98333},
                {name:"@lang('city_name.city4')", lat: 48.00278, lon: 37.80528},
                {name:"@lang('city_name.city5')", lat: 47.09750, lon:37.54361},
                {name:"@lang('city_name.city6')", lat: 50.25667, lon: 28.66417},
                {name:"@lang('city_name.city7')", lat: 47.84361, lon: 35.13056},
                {name:"@lang('city_name.city8')", lat: 48.92278, lon: 24.71028},
                {name:"@lang('city_name.city9')", lat: 48.50917, lon: 32.25889},
                {name:"@lang('city_name.city10')", lat: 48.57444, lon: 39.30778},
                {name:"@lang('city_name.city11')", lat: 50.74722, lon: 25.32528},
                {name:"@lang('city_name.city12')", lat: 49.83917, lon: 24.02972},
                {name:"@lang('city_name.city13')", lat: 46.97583, lon: 31.99472},
                {name:"@lang('city_name.city14')", lat: 46.46667, lon: 30.73333},
                {name:"@lang('city_name.city15')", lat: 49.58944, lon: 34.55139},
                {name:"@lang('city_name.city16')", lat: 50.62111, lon: 26.25194},
                {name:"@lang('city_name.city17')", lat: 50.90722, lon: 34.79861},
                {name:"@lang('city_name.city18')", lat: 49.55306, lon: 25.59500},
                {name:"@lang('city_name.city19')", lat: 48.62111, lon: 22.28778 },
                {name:"@lang('city_name.city20')", lat: 50.00444, lon: 36.23139},
                {name:"@lang('city_name.city21')",  lat: 46.63611, lon: 32.61694},
                {name:"@lang('city_name.city22')", lat: 49.42194 , lon: 26.98972},
                {name:"@lang('city_name.city23')", lat: 49.44444, lon: 32.05972},
                {name:"@lang('city_name.city24')", lat: 51.50000, lon: 31.30000},
                {name:"@lang('city_name.city25')", lat: 48.29222, lon: 25.93500},
                {name:"@lang('city_name.city26')", lat: 44.94806, lon: 34.10417}];

            for(i=0.001;i<4; i+=0.001)
                for(j=0; j<misto.length;j++){
                    if((misto[j].lat<pos.coords.latitude+i && misto[j].lat>=pos.coords.latitude-i) && (misto[j].lon<pos.coords.longitude+i && misto[j].lon>=pos.coords.longitude-i)){
                        let geoposition = misto[j].name;
                        document.querySelector('.geoposition').innerHTML = geoposition;
                        // .js-set-auto-city

                        document.getElementById('js-set-auto-city').onclick = function() {
                            document.getElementById('set-auto-city').getElementsByTagName('input')[0].value = geoposition;
                        }
                        return;
                    }
                }
            }

            if(navigator.geolocation){

                navigator.geolocation.getCurrentPosition(position, function(e){
                        alert('Error.code: '+e.code+' Error.message: '+e.message);
                    }
                );

            }else alert("Ваш браузер НЕ підтримує геолокацію.");
    </script>

    </body>
</html>
