@forelse($array_warehouses as $key => $warehouse)
    <option value="{{ $warehouse['value'] }}" @if($key == 0) selected @endif>{{ $warehouse['text'] }}</option>
@empty
    <option value="null">Отделения не найдены</option>
@endforelse