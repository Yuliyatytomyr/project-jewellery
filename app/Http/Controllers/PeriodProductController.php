<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeriodProduct;
use App\Models\Product;
use App\Models\Gproduct;
use App\Models\Gpimage;
use App\Models\Subcategory;
use App\Models\PeriodProdcut;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\StaticFunctions\SF;
use Intervention\Image\Facades\Image;

class PeriodProductController extends Controller
{
    //

    public function index(){
        return view('administration.admin.periodproduct.index');
    }

    public function show(){
        return view('administration.admin.periodproduct.show');
    }

    public function getAll(){
        try {
            // $products = PeriodProduct::all()->paginate(15);
            $products = PeriodProduct::paginate(15);
            return $products;
            //return view('administration.admin.periodproduct.index')->withProducts($products);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }
    
    public function getById($id){
        try {
            $find = PeriodProduct::find($id);
            
            return response()->json($find, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }

    public function create(Request $request){
        try {
            // print_r($request->input("subcategory_id"));
            $subcategory = Subcategory::select(['id', 'category_id'])->where('id', $request->input("subcategory_id"))->first();
            if(!$subcategory){
                $sub_array_errors = ['ru'=>'Не выбрана подкатегория товара!','ua'=>'Не обрана категорія товару!'];
                return response()->json([
                    'status' => 'validation',
                    'errors' => [
                        'subcategory_id' => [
                            0 => $sub_array_errors[app()->getLocale()]
                        ]
                    ]
                ], 200);
            }
            // return "ok";
            $validator = Validator::make($request->all(), [
                'item_code' => ['required', 'string', 'unique:gproducts,item_code'],
                'name_ru' => ['required', 'string', 'max:50'],
                'name_ua' => ['required', 'string', 'max:50'],
                'gallery' => ['required', 'string'],
                'desc_ru' => ['required', 'string'],
                'desc_ua' => ['required', 'string'],
                'barcode' => ['required', 'string'],
                'weight' => ['required', 'numeric'],
                'g_price' => ['required', 'numeric'],
                'total_sum' => ['required', 'numeric'],
                'sale' => ['required', 'numeric'],
                'size' => ['required', 'numeric']
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => 'validation',
                    'errors' => $validator->getMessageBag()->toArray()
                ], 400);
            }
          
            $gproduct_alias = SF::str2url($request->input("name_ru").'_artikul_'.$request->input("item_code"));
            
            $new_gproduct = Gproduct::create([
                'alias' => $gproduct_alias,
                'item_code' => $request->input("item_code"),
                'category_id' => $subcategory->category_id,
                'subcategory_id' => $subcategory->id,
                'name_ru' => $request->name_ru,
                'name_ua' => $request->name_ua,
                'desc_ru' => $request->desc_ru,
                'desc_ua' => $request->desc_ua,
                'new_on' => $request->new_on,
                'topsale_on' => $request->topsale_on,
                'sprice_on' => $request->sprice_on
            ]);

            $product = new Product();
            $product->sku_option = $request->input('sku_option');
            $product->barcode = $request->input('barcode');
            $product->gproduct_id = $new_gproduct->id;
            $product->size = $request->input('size');
            $product->weight = $request->input('weight');
            $product->g_price = $request->input('g_price');
            $product->sale = $request->input('sale');
            $product->total_sum = $request->input('total_sum');
            if($request->input('status') || !empty($request->input('status'))){
                $product->status = $request->input('status');
            }

            $product->save();

            PeriodProduct::find($request->input('period_product_id'))->delete();
            // $product = PeriodProduct::find($request->input('period_product_id'))->first();
            $gallery_array = explode (',',$request->gallery );
            self::createNewGpimages($new_gproduct->id, $gallery_array);
            // print_r($request->input('period_product_id'));

            // $photos = $request->except('alias', 'item_code', 'category_id', 'subcategory_id', 'name_ru',
            //         'name_ua', 'desc_ru', 'desc_ua', 'barcode', 'weight', 'g_price','total_sum',
            //         'sale','size','new_on','topsale_on','sprice_on', 'status'
            // );
            // $array = array();
            // $array_send = array();
            // foreach ($photos as $photo) {
            //     $fileName = time().rand(). '.' . $photo->getClientOriginalExtension();
            //     $img = Image::make($photo->getRealPath());
            //     $img->stream();
            //     $path = "images/uploads/gproducts_img/$fileName";
            //     array_push($array, $path);
            //     $photoName = $photo->getClientOriginalName();
            //     $array_send["$photoName"] = $path; 
            //     // print_r($array_send);
            //     // Gproduct::where('id', $new_gproduct->id)->update(['gallery' => json_encode($array) ]);
            //     Gpimage::create([
            //         'gproduct_id' => $product->gproduct_id ,
            //         'image_path' => 'images/uploads/gproducts_img/'.$fileName
            //     ]);
            //     Storage::disk('public')->put('images/uploads/gproducts_img/'.$fileName, $img, 'public');
            // }
            return response()->json([
                'status' => 'success',
                'redirect' => $request->redirect
            ], 200);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }

    private function createNewGpimages($gproduct_id, $images){
        foreach ($images as $image){
            Gpimage::create([
                'gproduct_id' => $gproduct_id,
                'image_path' => $image
            ]);
        }
    }
}
