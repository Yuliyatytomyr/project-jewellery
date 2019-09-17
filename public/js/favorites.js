
$('body').on('click', '.card-hover_like', function (e) {
    let value = $(this).data('id');
    let url = baseUrl+'/'+baseLocale+'/customer/favorites';
    let token = $('meta[name="csrf-token"]').attr('content');
    let formData = new FormData();

    formData.append('_token', token);
    formData.append('gproduct_id', value);

    sendAction(url, formData, (data) => {

        $('.favorit-prod_amount').html(data.count);
        //toastr.info(data.msg);
    });
});

$('body').on('click', '.card-hover_nolike', function (e) {
    let value = $(this).data('id');
    let url = baseUrl+'/'+baseLocale+'/customer/favorites/'+value;
    let token = $('meta[name="csrf-token"]').attr('content');
    let formData = new FormData();

    formData.append('_token', token);
    formData.append('_method', 'delete');

    sendAction(url, formData, (data) => {

        if(data.userType == 'guest'){
            $('.favorit-prod_amount').html(data.count);
            $('#customer-favorites-place #favorite-product-'+data.id).remove();
            //toastr.info('Товар удален из "избранное"');

            if(data.count == 0){
                $('#customer-favorites-place').html(data.render);
            }
        }else if(data.userType == 'auth'){
            $('.favorit-prod_amount').html(data.count);
            $('#private-office_content').html(data.render);
        }


    });
});
