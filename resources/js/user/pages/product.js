(function($){$(function() {
    $(document).ready(function(){
        // begin scripts
        $('body').on('click', '.card-store_img-prev .thumb', function(){
            let imgThumb = $(this).attr('src');
            let wrapFull = $('#card-store_img-main');
            let imgArr = wrapFull.find('img');
            var thumb = $(".thumb")
            $(this).addClass("thumb-active")
            thumb.not(this).removeClass("thumb-active");
            imgArr.each(function (i, e) {
                let newImg = $(e).attr('src');
                if(newImg != imgThumb) {
                    $(e).hide();
                }else{
                    $(e).show();
                }
            })
        });
        // end scripts
    });
})
})(jQuery)