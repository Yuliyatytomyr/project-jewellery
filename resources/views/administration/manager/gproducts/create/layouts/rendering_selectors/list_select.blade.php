<div class="col-md-6 gp-params" id="gp-param-{{ $param->id }}" data-param="{{ $param->id }}">
    <div class="form-group">
        <label for="gp-subcat-id">{{ $param->getNameTran() }}</label>
        <select name="param[{{$param->id}}][]" class="form-control" id="gp-subcat-id"  form="gproduct-create-form">
            @forelse($pvalues as $pvalue)
                <option value="{{  $pvalue->id }}">{{ $pvalue->getNameTran() }}</option>
            @empty
                <option value="null">значения не найдены</option>
            @endforelse
        </select>
    </div>
</div>



