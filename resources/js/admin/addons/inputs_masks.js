(function ($) {
    'use strict';
    $(function () {
        // full phone mask
        var fullPhone = new Inputmask("+3 8(999)999-99-99",{ "clearIncomplete": true, "onincomplete": function(){
                toastr.warning('Не верно указан номер телефона!');
            }});
        fullPhone.mask($('.phone-mask-f'));

        // full phone mask
        var shortPhone = new Inputmask("(999)999-99-99",{ "clearIncomplete": true, "onincomplete": function(){
                toastr.warning('Не верно указан номер телефона!');
            }});
        shortPhone.mask($('.phone-mask-s'));
    });
})(jQuery);