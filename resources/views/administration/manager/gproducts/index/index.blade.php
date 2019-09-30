@extends('administration.app.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4>
                        {{ $title }}
                        <a href="{{ asset(app()->getLocale().'/manager/gproducts/create') }}" title="добавить товар"><i class="fa fa-plus text-success"></i></a>
                    </h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>(Категория) подкатегория</th>
                            <th>Название</th>
                            <th>Изображения</th>
                            <th>Удаление</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody id="gproducts-place">

                        @forelse($gproducts as $gproduct)
                            <tr>
                                <td class="group-id">
                                    ({{ $gproduct->category->getNameTran() }}) {{ $gproduct->subcategory->getNameTran() }}
                                </td>

                                <td class="group-id">
                                    <a href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias) }}">
                                        {{ $gproduct->getNameTran() }}
                                    </a>
                                </td>

                                <td class="text-center">
                                </td>

                                <td>
                                    <input type="button" class="delete" name="delete" value="Delete">
                                </td>
                                <td class="text-center">
                                    <a class="text-info mr-3" href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias) }}" title="Просмотреть товар {{ $gproduct->name_ru }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="text-warning" href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias.'/edit') }}" title="Редактировать товар {{ $gproduct->name_ru }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Товары не найдены</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $gproducts->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script2')
    <script>
        $('.delete').click(function (e) {
            e.preventDefault();
            var url = $(this).data('href');
            var button = $(this),
                tr = button.closest('tr');
            var id = tr.find('td.group-id').text();
            console.log('clicked button with id', id);
            if (confirm('Are you sure you want to delete this entry?')) {
                console.log('sending request');
                {{--$.post('{{ asset(app()->getLocale().'/manager/gproducts/') }}', id, function (res) {--}}
                {{--    console.log('received response', res);--}}
                {{--    if (res.status) {--}}
                {{--        console.log('deleting TR');--}}
                {{--        tr.remove();--}}
                {{--    }--}}
                {{--}, 'json');--}}
                $.ajax({ //  сам запрос
                    type: 'POST',
                    url: url,
                    data: id, // данные которые передаём  серверу
                    dataType: "json" // предполоижтельный формат ответа сервера
                }).done(function(res) { // если успешно
                    console.log('Ответ получен: ', res);
                    if (res.status) { // если все хорошо
                        console.log('ОК!)');
                        tr.remove();
                    } else { // если не нравится результат
                        console.log('Пришли не те данные!');
                        console.log(res.message);
                    }
                }).fail(function() { // если ошибка передачи
                    console.log('Ошибка выполнения запроса!');
                });
            }
        });
    </script>
{{--<script>--}}
{{--    $(document).ready (function() {--}}
{{--        $(".delete").bind("click", function () {--}}
{{--            var url = $(this).data('href');--}}
{{--            var button = $(this),--}}
{{--                tr = button.closest('tr');--}}
{{--            var id = tr.find('td.group-id').text();--}}
{{--            console.log('clicked button with id', id);--}}
{{--            $.ajax({--}}
{{--                url: url,--}}
{{--                type: "POST",--}}
{{--                data: id,--}}
{{--                dataType: "html",--}}
{{--                success: function (data) {--}}
{{--                    alert(data);--}}
{{--                    tr.remove();--}}
{{--                    // document.getElementById('update' ).click();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
@endsection
