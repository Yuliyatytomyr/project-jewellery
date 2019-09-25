<div class="row" id="customer-favorites-place">
    @forelse($gproducts as $gproduct)
        <div class="col-6 col-md-4 mb-5 card-catalog-height favorite-product"  id="favorite-product-{{ $gproduct->id }}">
            @include('user.profile.index.layouts.profile_content.favorites_layouts.new_product_card')
        </div>
    @empty
        @include('user.profile.index.layouts.profile_content.favorites_layouts.clean_favorite_block')
    @endforelse
</div>
<div class="row">
        {{ $gproducts->links('vendor.pagination.pagination_catalog') }}
</div>
