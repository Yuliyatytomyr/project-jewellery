(function($){$(function() {
    $(document).ready(function(){
    // begin scripts

        // preloader
        $('.holder').hide();
        // preloader (end)

        //  Menu catallog toggle
        $("body").on('click', '.menu-toggle.active', function(){
            $(this).closest('.header-block_navigation').toggleClass('open-dinamic');
            $('.header-block_navigation-cont').toggleClass('open-dinamic');
        });

        $('.mega-submenu').hover(function() {
            $('.menu_link').toggleClass('active');
        });
        //  Menu catallog toggle (end)

        // search inputs
        $('.search-input').on('click', function(e) {
            $('.search-input').addClass('open');
            e.preventDefault();
        });

        $(document).mouseup(function (e){ // событие клика по веб-документу
            let div = $(".open"); // тут указываем ID элемента
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0) { // и не по его дочерним элементам
                div.removeClass('open'); // скрываем его
            }
        });

        $(".search-icon").click(function() {
            $("#menuMobSearch").toggleClass('hideSearchBlock');
            $('#modal-mobile-busket').modal('hide');
            $('#modal-mobile-menu').modal('hide');
            $(".menu-toggle").removeClass('d-n');
            $(".menu-toggle-cross").addClass('d-n');
        });
        // $(".search-toggle").keyup(function count(){
        //     let number = $(this).val().length;
        //     let toggleBlock = $(this).data('block');
        //
        //     if (number > 2){
        //         $("#"+toggleBlock).removeClass('hideSearchBlock')
        //     }
        //     else{
        //         $("#"+toggleBlock).addClass('hideSearchBlock')
        //     }
        //     $(this).click(function() {
        //         number = $(this).val().length;
        //
        //         if (number > 2){
        //             $("#"+toggleBlock).removeClass('hideSearchBlock')
        //         }
        //     });
        // });
        $(document).mouseup(function (e){ // событие клика по веб-документу
            let modalSearch = $("#quick-search-block"); // тут указываем ID элемента
            if (!modalSearch.is(e.target) // если клик был не по нашему блоку
                && modalSearch.has(e.target).length === 0) { // и не по его дочерним элементам
                modalSearch.addClass('hideSearchBlock'); // скрываем его
            }
        });
        // search inputs(end)

        // Contact click header
        $('.logo-list_header').on('click', function(e) {
            $(this).find('.contact-header').toggleClass('open');
            $(this).find('.contact-header_hide').toggleClass('open');
            $(this).find('.contact-header_icon').toggleClass('open');
            e.stopPropagation();
        });

        $('.sel-cust').on('click', function(e) {
            $(this).find('.select-cust').toggleClass('open');
            $(this).find('.select-cust_hide').toggleClass('open');
            $(this).find('.header_icon').toggleClass('open');
            e.stopPropagation();
        });
        $('.sel-cust').on('click', function(e) {
            $(this).find('.select-custFoot').toggleClass('open');
            $(this).find('.select-custFoot_hide').toggleClass('open');
            $(this).find('.header_iconFoot').toggleClass('open');
            e.stopPropagation();
        });
        $('.header-nav-right').on('click', function(e) {
            $(this).find('.header-nav-right_log').toggleClass('open');
            $(this).find('.header-nav-right_log-hide').toggleClass('open');
            $(this).find('.contact-header_icon').toggleClass('open');
            e.stopPropagation();
        });
        // Contact click header(end)

        // Checkbox form bucket
        let $formHide = $('.form-hide').css('display', 'none');
        $('#customCheck1').click(function(){
            if ($(this).is(':checked')){
               $formHide.show();
            } else {
                $formHide.hide();
            }
        });
        // Checkbox form bucket(end)

        // home tab list
        $(".tab-list").on("click", ".tab", function (e) {

            e.preventDefault();

            $(".tab").removeClass("active");
            $(".tab-content").removeClass("show");
            $(this).addClass("active");
            $($(this).attr("href")).addClass("show");
        });
        // home tab list(end)

        // remove class for blocks
        function checkWidth() {
            var windowWidth = $('body').innerWidth(),
                elem = $(".subscribeBlock");
            if(windowWidth <= 991.9) {
                elem.removeClass("input-group");
            }
            else {
                elem.addClass("input-group");
            }
        }
        checkWidth(); // проверит при загрузке страницы
        $(window).resize(function(){
            checkWidth(); // проверит при изменении размера окна клиента
        });
        // remove class for blocks (end)

        // script for fixed nav-menu
        $(window).scroll(function(){
            if ($(window).scrollTop() > 190) {
                $('.navMob').addClass('header-fixed');
                $('.float_top_menu').addClass('header-fixedDesk');
            }
            else {
                $('.navMob').removeClass('header-fixed');
                $('.float_top_menu').removeClass('header-fixedDesk');
            }
        });
        // script for fixed nav-menu (end)

        // mobile nav buttons for open modals
        $('body').on('click', '#bucketMob_fun', function (e) {
            $('#modal-mobile-busket').modal('toggle');
            $('#modal-mobile-busket').modal({
                backdrop : 'static',
                keyboard : false
            });
            $('#modal-mobile-menu').modal('hide');
            $("#menuMobSearch").addClass('hideSearchBlock');
            $(".menu-toggle").removeClass('d-n');
            $(".menu-toggle-cross").addClass('d-n');
        });
        $('body').on('click', '#menuMob_fun', function (e) {
            $('#modal-mobile-menu').modal('toggle');
            $('#modal-mobile-menu').modal({
                backdrop : 'static',
                keyboard : false
            });
            $('#modal-mobile-busket').modal('hide');
            $("#menuMobSearch").addClass('hideSearchBlock');
            $(".menu-toggle").toggleClass('d-n');
            $(".menu-toggle-cross").toggleClass('d-n');
        });
    // end scripts
    });
})
})(jQuery)