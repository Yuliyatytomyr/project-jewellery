<div class="col-md-6 gp-params" id="gp-param-{{ $gp_param->param->id }}" data-param="{{ $gp_param->param->id }}">
    <div class="form-group">
        <label for="gp-subcat-id">{{ $gp_param->param->getNameTran() }}</label>
        <select name="param[{{$gp_param->param->id}}][]" class="form-control" id="gp-subcat-id"  form="gproduct-edit-form">
            @forelse($gp_param->param->pvalues as $pvalue)
                <option value="{{  $pvalue->id }}" @if($pvalue->id == $gp_param->gpvalues->first()->pvalue_id) selected @endif>{{ $pvalue->getNameTran() }}</option>
            @empty
                <option value="null">значения не найдены</option>
            @endforelse
        </select>
    </div>
</div>



