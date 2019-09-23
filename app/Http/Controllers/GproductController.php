<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gproduct;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class GproductController extends Controller
{
    //
    public function getBySubcategory($subcategoryId){
        try {
            $find = Gproduct::where('subcategory_id', $subcategoryId)->with(['category', 'subcategory'])->get();

            return response()->json($find, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }

    public function getByCategory($categoryId){
        try {
            $find = Gproduct::where('category_id', $categoryId)->with(['category', 'subcategory'])->get();

            return response()->json($find, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }

    public function index(){
        try {
            $find = Gproduct::with(['category', 'subcategory'])->get();

            return response()->json($find, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }

    public function show($gproduct){

        try {

            $find = Gproduct::find($gproduct);
            $category = $find->category;
            $subcategory = $find->subcategory;

            return response()->json($find, 200);

        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
        
    }

    public function store(Request $request){

        try {
            $gproduct = new Gproduct();

            //$category = Category::where('alias', $request->input('category'))->first();
            //$subcategory = Subcategory::where('alias', $request->input('subcategory'))->first();

            $gproduct->alias = $request->input('alias');
            $gproduct->item_code = $request->input('item_code');
            // $gproduct->category_id = $category->id;
            // $gproduct->subcategory_id = $subcategory->id;
            $gproduct->category_id = $request->input('category_id');
            $gproduct->subcategory_id = $request->input('subcategory_id');
            $gproduct->name_ru = $request->input('name_ru');
            $gproduct->name_ua = $request->input('name_ua');
            $gproduct->desc_ru = $request->input('desc_ru');
            $gproduct->desc_ua = $request->input('desc_ua');
            $gproduct->gallery = $request->input('gallery');
            $gproduct->new_on = $request->input('new_on');
            $gproduct->topsale_on = $request->input('topsale_on');
            $gproduct->sprice_on = $request->input('sprice_on');

            $gproduct->save();
        
            $product = new Product();
            $product->barcode = $request->input('barcode');
            $product->gproduct_id = $gproduct->id;
            $product->size = $request->input('size');
            $product->weight = $request->input('weight');
            $product->g_price = $request->input('g_price');
            $product->sale = $request->input('sale');
            $product->total_sum = $request->input('total_sum');
            $product->status = $request->input('status');

            $product->save();

            return response()->json(201);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }

    public function destroy($id){

        try {
            Gproduct::find($id)->delete();

            return response()->json("Deleted", 200);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }

    }


    public function updateGproduct(Request $request, $id){
        try {

            Gproduct::find($id)->update($request->all());
            Product::where("gproduct_id", $id)->update($request->except([
                'alias','item_code','name_ru',
                'name_ua','desc_ru','desc_ua',
                'new_on', 'topsale_on','sprice_on'
            ]));

            return response()->json(200);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }

    public function updateGproductPhoto(Request $request, $id){

        $photos = $request->all();
        $array = array();
        $array_send = array();
        foreach ($photos as $photo) {
            $fileName = time().rand(). '.' . $photo->getClientOriginalExtension();
            $img = Image::make($photo->getRealPath());
            $img->stream();
            $path = "images/uploads/gproducts_img/$fileName";
            array_push($array, $path);
            $photoName = $photo->getClientOriginalName();
            $array_send["$photoName"] = $path; 
            //print_r($array_send);
            Gproduct::where('id', $id)->update(['gallery' => json_encode($array) ]);
            Storage::disk('public')->put('images/uploads/gproducts_img/'.$fileName, $img, 'public');
        }
        return response()->json($array_send, 200);
        // Storage::disk('public')->put('images/uploads/gproducts_img'.'/'.$fileName, $img, 'public');
    }
}
