<?php

namespace App\Http\Controllers\User\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
// models
use App\Models\Category;
use App\Models\Gproduct;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Request $request, $locale, $alias){

        $gproduct = Gproduct::where('alias', $alias)->first();
        $gproduct->load(['gpimages', 'category']);
        $sizes_avail_products = Product::where('gproduct_id', $gproduct->id)->where('status', 'new')->select(\DB::raw('count(*) as count_products, products.size, max(g_price)'))->groupBy('size')->pluck('size')->toArray();
        // кольца [15.5, 16, 16.5, 17, 17.5, 18, 18.5, 19, 19.5, 20]
        // браслеты [16, 16.5, 17, 17.5, 18, 18.5, 19, 19.5, 20, 20.5, 21]
        // цепочки  [40, 45, 50, 55, 60, 65]
        //dd(json_encode([15.5, 16, 16.5, 17, 17.5, 18, 18.5, 19, 19.5, 20]));$gproduct->category->size_array
        $category = Category::find(6);
       // dd(json_decode($category->size_array));
        if(!$gproduct){ abort('404'); }
        return view('user.product.show.show', compact('gproduct', 'sizes_avail_products'));
    }
}
