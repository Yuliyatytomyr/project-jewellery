@extends('administration.app.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>Имя</th>
                            <th>Цена</th>
                            <th>Проба</th>
                            <th>Вес</th>
                            <th>Бренд</th>
                        </tr>
                        </thead>

                        <tbody id="gproducts-place">

{{--                            <tr>--}}
{{--                                <td class="group-id">--}}
{{--                                    ({{ $gproduct->category->getNameTran() }}) {{ $gproduct->subcategory->getNameTran() }}--}}
{{--                                </td>--}}

{{--                                <td class="group-id">--}}
{{--                                    <a href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias) }}">--}}
{{--                                        {{ $gproduct->getNameTran() }}--}}
{{--                                    </a>--}}
{{--                                </td>--}}

{{--                                <td class="text-center">--}}
{{--                                </td>--}}

{{--                                <td>--}}
{{--                                    <input type="button" class="delete" name="delete" value="Delete">--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <a class="text-info mr-3" href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias) }}" title="Просмотреть товар {{ $gproduct->name_ru }}">--}}
{{--                                        <i class="fa fa-eye"></i>--}}
{{--                                    </a>--}}
{{--                                    <a class="text-warning" href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias.'/edit') }}" title="Редактировать товар {{ $gproduct->name_ru }}">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr class="null">
                                <td colspan="5" class="text-center">Товары не найдены</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="pagination"></div>
{{--                    {{ $gproducts->links() }}--}}
                </div>
            </div>
        </div>

    </div>
    <script>

        const  action = ['name', 'price', 'probe', 'weight', 'brand_new'];
        let paginate = {};

        $(document).ready (function() {
            getPivotDataProduct(getPage())
        });

        function getPivotDataProduct(page){
            page = page < 0 ? 1 : page;
            $.ajax({
                url: `/api/period_product?page=${page}`,
                type: "GET",
                dataType: "json",
                success: function (res) {
                    let fragment = createFragmentTable(res.data);
                    let table = document.querySelector('#gproducts-place');
                    table.prepend(fragment);
                    let noProduct = document.querySelector('.null');
                    noProduct.style.display = res.data.length > 0 ? 'none': 'block';
                    init(res.last_page, page);
                    res.data && delete res.data;
                    paginate = res;
                    createPageEvent()
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }


        let toCreatePage = (e) => {
            let id = e.target.getAttribute('id');
            window.location.href = `/period_product/${id}`;
        };

        function createPageEvent(){
            document.querySelectorAll('#gproducts-place tr')
                .forEach(item => item.addEventListener('click', toCreatePage))
        }


        function getPage () {
            let textArr = location.search.split('=');
            let index = -1;
            textArr.forEach((item, ind)  => item.indexOf('page') > -1 && (index = ind));
            index > -1 && (textArr = textArr[index + 1]);
            return Number(textArr)
        }

        function createFragmentTable (arr) {
            let fragment = document.createDocumentFragment();
            arr.forEach((browser) => {
                let tr = document.createElement('tr');
                action.forEach(item => {
                    let td = document.createElement('td');
                    td.textContent = browser[item];
                    td.setAttribute('id',browser.id);
                    tr.appendChild(td);
                });
                fragment.appendChild(tr);
            });
            return fragment;
        }



        var Pagination = {

            code: '',

            // --------------------
            // Utility
            // --------------------

            // converting initialize data
            Extend: function(data) {
                data = data || {};
                Pagination.size = data.size || 300;
                Pagination.page = data.page || 1;
                Pagination.step = data.step || 3;
            },

            // add pages by number (from [s] to [f])
            Add: function(s, f) {
                for (var i = s; i < f; i++) {
                    Pagination.code += '<a>' + i + '</a>';
                }
            },

            // add last page with separator
            Last: function() {
                Pagination.code += '<i>...</i><a>' + Pagination.size + '</a>';
            },

            // add first page with separator
            First: function() {
                Pagination.code += '<a>1</a><i>...</i>';
            },



            // --------------------
            // Handlers
            // --------------------

            // change page
            Click: function() {
                Pagination.page = +this.innerHTML;
                window.location.href = `/period_product?page=${Pagination.page}`;
                Pagination.Start();
            },

            // previous page
            Prev: function() {
                Pagination.page--;
                if (Pagination.page < 1) {
                    Pagination.page = 1;
                }
                window.location.href = `/period_product?page=${Pagination.page}`;
                Pagination.Start();
            },

            // next page
            Next: function() {
                Pagination.page++;
                if (Pagination.page > Pagination.size) {
                    Pagination.page = Pagination.size;
                }
                window.location.href = `/period_product?page=${Pagination.page}`;
                Pagination.Start();
            },



            // --------------------
            // Script
            // --------------------

            // binding pages
            Bind: function() {
                var a = Pagination.e.getElementsByTagName('a');
                for (var i = 0; i < a.length; i++) {
                    if (+a[i].innerHTML === Pagination.page) a[i].className = 'current';
                    a[i].addEventListener('click', Pagination.Click, false);
                }
            },

            // write pagination
            Finish: function() {
                Pagination.e.innerHTML = Pagination.code;
                Pagination.code = '';
                Pagination.Bind();
            },

            // find pagination type
            Start: function() {
                if (Pagination.size < Pagination.step * 2 + 6) {
                    Pagination.Add(1, Pagination.size + 1);
                }
                else if (Pagination.page < Pagination.step * 2 + 1) {
                    Pagination.Add(1, Pagination.step * 2 + 4);
                    Pagination.Last();
                }
                else if (Pagination.page > Pagination.size - Pagination.step * 2) {
                    Pagination.First();
                    Pagination.Add(Pagination.size - Pagination.step * 2 - 2, Pagination.size + 1);
                }
                else {
                    Pagination.First();
                    Pagination.Add(Pagination.page - Pagination.step, Pagination.page + Pagination.step + 1);
                    Pagination.Last();
                }
                Pagination.Finish();
            },



            // --------------------
            // Initialization
            // --------------------

            // binding buttons
            Buttons: function(e) {
                var nav = e.getElementsByTagName('a');
                nav[0].addEventListener('click', Pagination.Prev, false);
                nav[1].addEventListener('click', Pagination.Next, false);
            },

            // create skeleton
            Create: function(e) {

                var html = [
                    '<a>&#9668;</a>', // previous button
                    '<span></span>',  // pagination container
                    '<a>&#9658;</a>'  // next button
                ];

                e.innerHTML = html.join('');
                Pagination.e = e.getElementsByTagName('span')[0];
                Pagination.Buttons(e);
            },

            // init
            Init: function(e, data) {
                Pagination.Extend(data);
                Pagination.Create(e);
                Pagination.Start();
            }
        };



        /* * * * * * * * * * * * * * * * *
        * Initialization
        * * * * * * * * * * * * * * * * */

        function init(size = 30, page = 1, step = 3) {
            Pagination.Init(document.getElementById('pagination'), {
                size: size, // pages size
                page: page,  // selected page
                step: step   // pages before and after current
            });
        }

    </script>

    <style>
        #pagination {
            display: inline-block;
            vertical-align: middle;
            border-radius: 4px;
            padding: 1px 2px 4px 2px;
            border-top: 1px solid #AEAEAE;
            border-bottom: 1px solid #FFFFFF;
            background-color: #DADADA;
            background-image: -webkit-linear-gradient(top, #DBDBDB, #E2E2E2);
            background-image:    -moz-linear-gradient(top, #DBDBDB, #E2E2E2);
            background-image:     -ms-linear-gradient(top, #DBDBDB, #E2E2E2);
            background-image:      -o-linear-gradient(top, #DBDBDB, #E2E2E2);
            background-image:         linear-gradient(top, #DBDBDB, #E2E2E2);
        }
        #pagination a, #pagination i {
            display: inline-block;
            vertical-align: middle;
            width: 22px;
            color: #7D7D7D;
            text-align: center;
            font-size: 10px;
            padding: 3px 0 2px 0;
            -webkit-user-select:none;
            -moz-user-select:none;
            -ms-user-select:none;
            -o-user-select:none;
            user-select:none;
        }

        #pagination a {
            margin: 0 2px 0 2px;
            border-radius: 4px;
            border: 1px solid #E3E3E3;
            cursor: pointer;
            box-shadow: inset 0 1px 0 0 #FFF, 0 1px 2px #666;
            text-shadow: 0 1px 1px #FFF;
            background-color: #E6E6E6;
            background-image: -webkit-linear-gradient(top, #F3F3F3, #D7D7D7);
            background-image:    -moz-linear-gradient(top, #F3F3F3, #D7D7D7);
            background-image:     -ms-linear-gradient(top, #F3F3F3, #D7D7D7);
            background-image:      -o-linear-gradient(top, #F3F3F3, #D7D7D7);
            background-image:         linear-gradient(top, #F3F3F3, #D7D7D7);
        }
        #pagination i {
            margin: 0 3px 0 3px;
        }
        #pagination a.current {
            border: 1px solid #E9E9E9;
            box-shadow: 0 1px 1px #999;
            background-color: #DFDFDF;
            background-image: -webkit-linear-gradient(top, #D0D0D0, #EBEBEB);
            background-image:    -moz-linear-gradient(top, #D0D0D0, #EBEBEB);
            background-image:     -ms-linear-gradient(top, #D0D0D0, #EBEBEB);
            background-image:      -o-linear-gradient(top, #D0D0D0, #EBEBEB);
            background-image:         linear-gradient(top, #D0D0D0, #EBEBEB);
        }
    </style>
@endsection
