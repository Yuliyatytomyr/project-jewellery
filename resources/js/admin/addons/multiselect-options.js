window.initMultiSelect = function(elem, data) {
    // data source example with filter by label
    $('body .multiselect-on').multiselect({
        templates: {
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
        },
        enableFiltering: true,
        filterBehavior: 'text',
        enableCaseInsensitiveFiltering: true,
        maxHeight: 200,
        buttonContainer: '<div class="btn-group w-100"></div>',
        templates: {

            ul: '<ul class="multiselect-container dropdown-menu" style="overflow: scroll;"></ul>',
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>',
            filter: '<li class="multiselect-item filter"><div class="input-group m-0 mb-1"><input class="form-control multiselect-search" type="text"></div></li>',
            filterClearBtn: '<div class="input-group-append"><button class="btn btn btn-outline-secondary multiselect-clear-filter" type="button"><i class="fa fa-close"></i></button></div>'
        },
        buttonText: function (options, select) {
            if (options.length === 0) {
                return 'Значения характеристики не выбраны ...';
            }
            else if (options.length > 0 && options.length < 4) {
                var labels = [];
                options.each(function () {
                    if ($(this).attr('label') !== undefined) {
                        labels.push($(this).attr('label'));
                    }
                    else {
                        labels.push($(this).html());
                    }
                });
                return labels.join(', ') + '';
            }
            else {
                return 'Выбрано (' + options.length + ') значений!';
            }
        }
    });

    $(elem).multiselect('dataprovider', data);
}