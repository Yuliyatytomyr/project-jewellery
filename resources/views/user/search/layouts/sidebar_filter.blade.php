@foreach($params_with_values as $params_with_value)
    <h5 class="articleFilter my-3">{{ $params_with_value->getNameTran() }}</h5>
    @if(isset($remove_pvalues))
        <?
        $add_to_filter_gpvalue =  implode(',', $array_pvalues_rem);
        ?>
        @foreach($params_with_value->pvalues as $pvalue)
            @if(in_array($pvalue->id, $array_pvalues_rem))
                <?
                $array_pvalues_rem_without = array_diff($array_pvalues_rem, [$pvalue->id]);
                $new_gpvalues_param = implode(',', $array_pvalues_rem_without);
                ?>
                <a class="custom-control custom-checkbox mt-2 w-1p">
                    <input type="checkbox" class="custom-control-input catalog-filter-item" data-url="{{ asset(app()->getLocale().'/search/submit?search='.$search.'&gpvalues='.$new_gpvalues_param) }}" id="customCheckCatalog{{ $pvalue->id }}" checked>
                    <label class="t-clize control-label ml-2" for="customCheckCatalog{{ $pvalue->id }}">{{ $pvalue->getNameTran() }} </label>
                </a>
            @else
                <a class="custom-control custom-checkbox mt-2 w-1p">
                    <input type="checkbox" class="custom-control-input catalog-filter-item" data-url="{{ asset(app()->getLocale().'/search/submit?search='.$search.'&gpvalues='.$add_to_filter_gpvalue.','.$pvalue->id) }}" id="customCheckCatalog{{ $pvalue->id }}">
                    <label class="t-clize control-label ml-2" for="customCheckCatalog{{ $pvalue->id }}">{{ $pvalue->getNameTran() }} </label>
                </a>
            @endif
        @endforeach
    @else
        @foreach($params_with_value->pvalues as $pvalue)
            <a class="custom-control custom-checkbox mt-2 w-1p">
                <input type="checkbox" class="custom-control-input catalog-filter-item" data-url="{{ asset(app()->getLocale().'/search/submit?search='.$search.'&gpvalues='.$pvalue->id) }}" id="customCheckCatalog{{ $pvalue->id }}">
                <label class="t-clize control-label ml-2" for="customCheckCatalog{{ $pvalue->id }}">{{ $pvalue->getNameTran() }} </label>
            </a>
        @endforeach
    @endif
@endforeach