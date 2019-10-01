@extends('administration.app.app')

@section('content')

    <form class="row forms-sample" id="gproduct-create-form" action=""  method="post">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gp-subcat-id">Подкатегория товара</label>
                        <select name="subcategory_id" class="form-control" id="gp-subcat-id" data-url="">
                            <option value="null">Выберите подкатегорию</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gp-item-code">Артикул товара</label>
                        <input type="text" class="form-control" id="gp-item-code" name="item_code" placeholder="Артикул товара">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gproduct-weight">Вес товара</label>
                        <input type="text" class="form-control" id="gproduct-weight" name="weight" placeholder="Вес товара">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gp-g_price">Старая цена</label>
                        <input type="text" class="form-control" id="gp-g_price" name="g_price" placeholder="Старая цена">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gp-total_sum">Новая цена</label>
                        <input type="text" class="form-control" id="gp-total_sum" name="total_sum" placeholder="Новая цена">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gp-sale">Скидка</label>
                        <input type="number" class="form-control" id="gp-sale" name="sale" placeholder="Скидка %">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gp-size">Размер</label>
                        <select name="size" class="form-control" id="gp-size">
                            <option id="size"></option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script2')
    <script>
        $(document).ready (function() {
            var pageURL = window.location.href;
            console.log(pageURL);
            var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
            console.log(lastURLSegment);
            $.ajax({
                url: '/api/period_product/' + lastURLSegment,
                type: "GET",
                dataType: "json",
                success: function (res) {
                    document.getElementById("gp-item-code").value = res.name;
                    document.getElementById("size").innerHTML = res.razmer;
                    document.getElementById("gp-g_price").value = res.price;
                    document.getElementById("gp-total_sum").value = res.special_price;
                    document.getElementById("gp-sale").value = res.discount;
                    document.getElementById("gproduct-weight").value = res.weight;
                    console.log(res)
                },
                error: function(err) {
                    console.log(err)
                }
            });
        });
    </script>
@endsection
