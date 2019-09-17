<div class="col-md-6 gp-params" id="gp-param-{{ $gp_param->param->id }}" data-param="{{ $gp_param->param->id }}">
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <label for="gp-param-select-{{ $gp_param->param->id }}">{{ $gp_param->param->getNameTran() }}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <select name="param[{{ $gp_param->param->id }}][]" class="form-control custom-select multiselect-on w-100" id="gp-param-select-{{ $gp_param->param->id }}" multiple="multiple" form="gproduct-edit-form">
                </select>
            </div>
        </div>
    </div>
    <script>
        initMultiSelect('#gp-param-select-'+'{{ $gp_param->param->id }}', {!! $json_array_params !!});
    </script>
</div>

