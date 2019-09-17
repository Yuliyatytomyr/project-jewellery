(function ($) {
    'use strict';
    $(function () {
        // user auth
        $('body').on('click', '.auth-submit', function (e) {
            let formId = $(this).attr('form');
            let form = $('#'+formId);

            sendAuthForm(form);
        });

        function sendAuthForm(form) {

            let url = form.attr('action');
            let formData = new FormData();

            $.each(form.serializeArray(), function( i, input ) {
                formData.append(input.name, input.value);
            });

            axios({
                method: 'POST',
                url: url,
                data: formData,
            })
                .then(function (response) {
                    if(response.status == 200){
                        let data = response.data;

                        if(data.status == 'validation'){
                            let errors = data.errors;

                            form.find('input').each(function (i,e) {
                                $(e).removeClass('is-invalid is-valid');
                            });

                            $.each(errors,function (key,velue) {
                                form.find('[name='+key+']').addClass('is-invalid');
                                if(typeof(velue) == 'object'){
                                    $.each(velue,function (k,v) {
                                        toastr.error(v);
                                    });
                                }else{
                                    toastr.error(velue);
                                }
                            });
                        }else if(data.status == 'success'){
                            if(typeof data.redirect != 'undefined'){
                                window.location.replace(data.redirect);
                            }
                            if(typeof data.msg != 'undefined'){
                                toastr.success(data.msg);
                            }
                        }


                    }

                }).catch(function (error) {
                console.log(error);
            });
        }
    });
})(jQuery);



