(function ($) {
    'use strict';
    $(function () {

        // change page
        $('.personal-area_bar').on('click', '.personal-area_bar-list', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let type = $(this).data('type');
            // $('.holder').show();

            let pageLinks = $('.personal-area_bar').find('.personal-area_bar-list')

            pageLinks.each(function (i, e) {
                let linkType = $(e).data('type');
                if(linkType == type){
                    $(e).addClass('active');
                }else{
                    $(e).removeClass('active');
                }
            });

            axios.get(url)
                .then(function (response) {
                   var data = response.data;
                   if(data.status == 'success'){
                       $('#private-office_content').html(data.render)

                       if(type == 'profile'){
                           var fullPhone = new Inputmask("+3 8(999)999-99-99",{ "clearIncomplete": true, "onincomplete": function(){
                                   toastr.warning('Не верно указан номер телефона!');
                               }});
                           fullPhone.mask($('.phone-mask-f'));
                       }

                   }else{
                       toastr.error('true');
                   }
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function () {
                    // $('.holder').hide();
                });
        });


        // submit profile form
        $('body').on('click', '#profile-user-edit-submit', function () {
            let form = $('#'+$(this).attr('form'));
            let url = form.attr('action');
            let data = form.serializeArray();

            let formData = new FormData();

            $.each(data, function( i, input ) {
                formData.append(input.name, input.value);
            });

            sendForm(form, url, formData, function(data){
                if(typeof data.msg != 'undefined'){
                    toastr.success(data.msg);
                }

                $('#profile-user').html(data.render);
            });
        });

        // chenge password
        $('body').on('click', '#profile-pas-edit-submit', function () {
            let form = $('#'+$(this).attr('form'));
            let url = form.attr('action');
            let data = form.serializeArray();

            let formData = new FormData();

            $.each(data, function( i, input ) {
                formData.append(input.name, input.value);
            });

            sendForm(form, url, formData, function(data){
                if(typeof data.msg != 'undefined'){
                    toastr.success(data.msg);
                }

            });
        });

        // hovered profile blocks
        $('#private-office_content').on('click', '.btn-form',  function () {
            let close = $('#'+ $(this).data('close'));
            let open = $('#'+ $(this).data('open'));

            close.slideUp(function () {
                open.slideDown();
            });
        });
        // hovered profile blocks (end)
    });
})(jQuery);



