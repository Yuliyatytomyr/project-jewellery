@forelse($gproducts as $gproduct)
    <div class="col-6 col-lg-3 mb-5 card-catalog-height favorite-product" id="favorite-product-{{ $gproduct->id }}">
        @include('user.favorites.index.layouts.new_product_card')
    </div>
@empty
    @include('user.favorites.index.layouts.clean_favorite_block')
@endforelse
