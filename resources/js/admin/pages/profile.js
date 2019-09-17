(function ($) {
    'use strict';
    $(function () {
        // select profile foto
        $('#profile-content').on('click','#file-upload-browse', function () {
            $('#profile-file').click();
        });
        $('#profile-content').on('change', '#profile-file', function(){
            $('#file-upload-info').val($(this).val());
        });

        // submit profile form
        $('body').on('click', '#profile-submit-b', function (e) {
            let form = $('#'+$(this).attr('form'));
            let url = form.attr('action');
            let data = form.serializeArray();
            let imagefile = document.querySelector('#profile-file');

            let formData = new FormData();

            if($('#profile-file').val() != ''){
                formData.append("photo", imagefile.files[0]);
            }

            $.each( data, function (i, v) {
                formData.append(v.name, v.value);
            });

             sendFormWithFiles(form, url, formData, function (data) {
                 $('#profile-content').html(data.render)
                 toastr.success(data.msg);
             });
        });


    });
})(jQuery);