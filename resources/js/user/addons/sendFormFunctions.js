window.sendFormWithFiles = function(form, url, formData, callback) {
    axios.post(url, formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
        .then(function (response) {
            if(response.status == 200){
                let data = response.data;

                form.find('input').each(function (i,e) {
                    $(e).removeClass('is-invalid is-valid');
                });

                if(data.status == 'validation'){
                    let errors = data.errors;

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
                    callback(data);
                }
            }
        }).catch(function (error) {
        console.log(error);
    });
}

window.sendForm = function(form, url, formData, callback) {
    axios.post(url, formData)
        .then(function (response) {
            if(response.status == 200){
                let data = response.data;

                form.find('input').each(function (i,e) {
                    $(e).removeClass('is-invalid is-valid');
                });

                if(data.status == 'validation'){
                    let errors = data.errors;

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
                    callback(data);
                }
            }
        }).catch(function (error) {
        console.log(error);
    });
}

window.sendAction = function(url, formData, callback) {
    axios.post(url, formData)
        .then(function (response) {
            if(response.status == 200){
                let data = response.data;

                if(data.status == 'error'){
                    toastr.error(data.msg);
                }else if(data.status == 'success'){
                    callback(data);
                }
            }
        }).catch(function (error) {
        console.log(error);
    });
}

window.sendActionGet = function(url, formData, callback) {
    axios.get(url, formData)
        .then(function (response) {
            if(response.status == 200){
                let data = response.data;

                if(data.status == 'error'){
                    toastr.error(data.msg);
                }else if(data.status == 'success'){
                    callback(data);
                }
            }
        }).catch(function (error) {
        console.log(error);
    });
}