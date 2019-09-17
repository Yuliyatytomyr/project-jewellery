<form class="col-12" action="{{ asset(app()->getLocale().'/manager/param/get_select_for_gp_edit') }}" method="post" id="add-param-gp-create-form">
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for="params-gps">Выбрать характеристики товара</label>
                <select class="form-control" name="test" id="params-gps">
                    @if(isset($params))
                        @if($params->count() > 0)
                            <option selected value="null">Выберите характеристику...</option>
                        @endif

                        @forelse($params as $param)
                            <option value="{{ $param->id }}">{{ $param->getNameTran() }}</option>
                        @empty
                            <option value="null">Характеристики не найдены</option>
                        @endforelse
                    @else
                        <option value="null">Характеристики не найдены</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <button type="button" class="btn btn-success h-100 w-100" id="add-param-gp-create-submit" form="add-param-gp-create-form">+ Добавить характеристику</button>
        </div>
    </div>
</form>