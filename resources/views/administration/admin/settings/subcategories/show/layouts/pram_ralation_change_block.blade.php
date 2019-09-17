@if($param->boolHasSubcat($subcategory->id))
    <button class="btn btn-danger change-relation-s-p" type="button" data-url="{{ asset(app()->getLocale().'/admin/settings/subcategories/'.$subcategory->id.'/param_detach') }}" data-param="{{ $param->id }}" data-action="detach">отключить</button>
@else
    <button class="btn btn-success change-relation-s-p" type="button" data-url="{{ asset(app()->getLocale().'/admin/settings/subcategories/'.$subcategory->id.'/param_attach') }}" data-param="{{ $param->id }}" data-action="attach">подключить</button>
@endif