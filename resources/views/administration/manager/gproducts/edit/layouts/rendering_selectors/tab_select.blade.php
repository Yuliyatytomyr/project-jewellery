<div class="col-md-6 gp-params" id="gp-param-{{ $param->id }}" data-param="{{ $param->id }}">
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <label for="gp-param-select-{{ $param->id }}">{{ $param->getNameTran() }}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <select name="param[{{ $param->id }}][]" class="form-control custom-select multiselect-on w-100" id="gp-param-select-{{ $param->id }}" multiple="multiple" form="gproduct-edit-form">
                </select>
            </div>
        </div>
    </div>
    <script>
        initMultiSelect('#gp-param-select-'+'{{ $param->id }}', {!! $pvalues !!});
    </script>
</div>

