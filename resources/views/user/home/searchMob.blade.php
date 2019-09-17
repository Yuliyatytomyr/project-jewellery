<div class="row">
    <div class="col-12">
        <h4 class="search-category mb-4">Категории</h4>
        <ul class="search-category-block p-0 d-f fd-c">
            @forelse($categories as $category)
                <li>
                    <a href="{{ asset(app()->getLocale().'/categories/'.$category->alias) }}" class="search-category-item">{{ $category->getNameTran() }}</a>
                </li>
            @empty
                <li>
                    <a class="search-category-item">Нет соответсвий</a>
                </li>
            @endforelse
        </ul>

        <h4 class="search-category mb-4">Подкатегории</h4>
        <ul class="search-category-block p-0 d-f fd-c">
            @forelse($subcategories as $subcategory)
                <li>
                    <a href="{{ asset(app()->getLocale().'/subcategories/'.$subcategory->alias) }}" class="search-category-item" title="{{ $subcategory->category->getNameTran().' '.$subcategory->getNameTran() }}">{{ $subcategory->getNameTran() }}</a>
                </li>
            @empty
                <li>
                    <a class="search-category-item">Нет соответсвий</a>
                </li>
            @endforelse
        </ul>
    </div>
    <div class="col-12">
        <h4 class="search-category mb-4">Популярные товары</h4>
        <div class="row">
            @forelse($gproducts as $gproduct)
                <?
                $product = $gproduct->productsNew->first();
                ?>
                <div class="col-12 col-md-6 p-3">
                <div class="card-search">
                    <div class="d-f">
                        <?
                        $image = $gproduct->gpimages->first();
                        ?>
                        <img class="card-static_imgSearch" src="{{ asset($image->image_path)}}">
                        <div class="card-search_sale">-{{ $product->sale }}%</div>
                        <div class="d-f fd-c ml-3">
                            <div class=""><p class="articleSearchProduct">{{ $gproduct->getNameTran() }}</p></div>
                            <div class="d-f jc-b mt-3">
                                <span class="card-search_price">{{ $product->total_sum }} грн</span>
                                <span class="card-search_sale-price mt-1">{{ $product->g_price }} грн</span>
                            </div>
                            <a href="{{ asset(app()->getLocale().'/products/'.$gproduct->alias) }}" class="text-white card-search_btn mt-2 mb-2 d-f jc-c">
                                Купить
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                Соответсвия не найдены
            @endforelse
        </div>
    </div>
</div>
