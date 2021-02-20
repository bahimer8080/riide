<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\RoleUser;
use App\Category;
use App\Store;
use App\StoreCategory;
use App\ScoreStore;
use App\Banner;
use App\AdvertisingSpaceBanner;
use App\AdvertisingSpace;
use App\TimeStore;
use App\Product;
use App\FeaturedProduct;

class AdminStoreController extends Controller
{



    public function index(){
        $stores = DB::table("store")
            ->where("user_id",\Auth::user()->id)
            ->get();
        return view("admin/store/index",[
            "stores" => $stores
        ]);
        //dd( $products );
    }

    public function storeOption(){
        
        return view("admin/store/store-option");
    }

    public function storeEditInfo(){
        $store = DB::table("store")
            ->where("user_id","=",\Auth::user()->id)
            ->get();

        $categories = DB::table("category")->get();
        //dd($store);
        return view("admin/store/store-edit",[
            "store" => $store,
            "categories" => $categories
        ]);
    }

    public function storeUpdateData(Request $request){


        $store = Store::where("user_id","=",\Auth::user()->id)
            ->get();

        $image = $store[0]->image;
        $bg_image = $store[0]->bg_image;
        if( $request->file('image') ){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();

            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $image = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        if( $request->file('bg_image') ){
            $profileImage = $request->file('bg_image');
            $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();

            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $bg_image = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        $store[0]->name = $request->input("name");
        $store[0]->image = $image;
        $store[0]->bg_image = $bg_image;
        $store[0]->time_delivery = $request->input("time_delivery");
        $store[0]->save();
        //dd( $request->input("categories") );

        foreach($request->input("categories") as $c){
            $st = new StoreCategory;
            $st->store_id = $store[0]->id;
            $st->category_id = $c;
            $st->save();
        }

        return redirect("/store-admin/store/edit");
    }

    public function timeEdit(){
        $store = DB::table("store")
            ->where("user_id","=",\Auth::user()->id)
            ->get();

        $time = DB::table("time_store")
            ->where("store_id","=",$store[0]->id)
            ->get();

        //dd($store);
        return view("admin/store/store-time",[
            "store" => $store,
            "time" => $time
        ]);
    }

    public function timeUpdate(Request $request){
        $store = DB::table("store")
            ->where("user_id","=",\Auth::user()->id)
            ->get();

        TimeStore::where("store_id","=",$store[0]->id)->delete();

        for( $i = 1 ; $i <= 7 ; $i++ ){
            $time = new TimeStore;
            $time->start = $request->input("day-$i-start");
            $time->end = $request->input("day-$i-end");
            $time->day = $i;
            $time->store_id = $store[0]->id;
            $time->save();
        }
        return redirect("/store-admin/store/time/edit");
        //dd($request);
    }


    public function createProduct(){
        $categories = DB::table("category")->get();
        //dd( $categories );
        return view("/admin/store/product-create",[
            "categories" => $categories
        ]);
    }

    public function postProduct(Request $request){
        $store = DB::table("store")
            ->where("user_id","=",\Auth::user()->id)
            ->get();
        $image = null;
        if( $request->file('image') ){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $image = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }


        $s = new Product;
        $s->name = $request->input("name");
        $s->description = $request->input("description");
        $s->price_a = $request->input("price_a");
        $s->price_b = $request->input("price_b");
        $s->store_id = $store[0]->id;
        $s->category_id = $request->input("category_id");
        $s->image = $image;
        $s->save();

        return redirect("/store-admin/products/1");
    }

    /*
    
    */

    public function getOptionStore($store_id){
        $stores = DB::table("store")
            ->where("id",$store_id)
            ->get();
        return view("admin/store/option",[
            "store" => $stores[0]
        ]);
    }

    public function createStore(){
        //$store = new Store;
        //$store->name =
        return view("admin/store/create-store");
    }

    public function getProducts($pagination){
        $stores = DB::table("store")
            ->where("user_id", \Auth::user()->id )
            ->get();
        //dd($stores);
        $products = DB::table("product")
            ->select(
                "product.id as id",
                "product.name as name",
                "product.description as description",
                "product.price_a as price_a",
                "product.price_b as price_b",
                "product.image as image",
                "product.featured as featured",
                "category.id as category_id",
                "category.name as category_name"
            )
            ->where("product.store_id", $stores[0]->id )
            ->join("category","category.id","=","product.category_id")
            ->get();
        //dd( $products );
        return view("admin/store/product-index",[
            "products" => $products
        ]);
    }

    public function editProduct($product_id){
        $categories = DB::table("category")->get();


        $product = DB::table("product")
            ->where("product.id","=",$product_id)
            ->get();
        return view("admin/store/product-edit",[
            "product" => $product,
            "categories" => $categories
        ]);
        //dd( $product );
    }

    public function updateProduct($product_id,Request $request){
        $store = DB::table("store")
            ->where("user_id","=",\Auth::user()->id)
            ->get();
        $product = Product::where("id",$product_id)->get();
        $image = $product[0]->image;
        if( $request->file('image') ){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $image = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        
        $product[0]->name = $request->input("name");
        $product[0]->description = $request->input("description");
        $product[0]->price_a = $request->input("price_a");
        $product[0]->price_b = $request->input("price_b");
        $product[0]->category_id = $request->input("category_id");
        $product[0]->image = $image;
        $product[0]->save();
        return redirect("/store-admin/products/1");
    }

    public function deleteProduct($product_id){
        $product = Product::where("id",$product_id)->delete();
        return redirect("/store-admin/products/1");
    }

    public function getBanners($pagination){
        $store = DB::table("store")
            ->where("user_id","=",\Auth::user()->id)
            ->get();

        $banners = DB::table("banner")
            ->where("store_id","=",$store[0]->id)
            ->get();

        return view("admin/store/banner-index",[
            "banners" => $banners
        ]);
        //dd($banners,$store);
    }

    public function createBanners(){
        return view("admin/store/banners-create");
    }

    public function postBanners(Request $request){
        $store = DB::table("store")
            ->where("user_id","=",\Auth::user()->id)
            ->get();

            $image = null;
            if( $request->file('banner') ){
                $profileImage = $request->file('banner');
                $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();
        
                $upload_path = 'img/';
                $profile_image_url = $upload_path . $profileImageSaveAsName;
                $image = $profile_image_url;
                $success = $profileImage->move($upload_path, $profileImageSaveAsName);
            }

        $banner = new Banner;
        $banner->image = $image;
        $banner->url = $request->input("url");
        $banner->store_id = $store[0]->id;
        $banner->save();

        return redirect("/store-admin/banners/1");
    }

    public function editBanner($banner_id){
        $banner = DB::table("banner")
            ->where("id",$banner_id)
            ->get();
        return view("admin/store/banner-edit",[
            "banner_id" => $banner_id,
            "banner" => $banner
        ]);
    }

    public function updateBanner($banner_id,Request $request){
        $banner = Banner::where("id",$banner_id)
            ->get();

        $image = $banner[0]->image;
        if( $request->file('banner') ){
            $profileImage = $request->file('banner');
            $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();
        
            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $image = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }
        
        $banner[0]->image = $image;
        $banner[0]->url = $request->input("url");
        $banner[0]->save();
        return redirect("/store-admin/banners/1");
    }

    public function deleteBanner($banner_id){
        $banner = Banner::where("id",$banner_id)
            ->delete();
        return redirect("/store-admin/banners/1");
    }

    public function featuredProduct($product_id){

        

        $product = Product::where("id",$product_id)->get();
        $product[0]->featured = 1;
        $product[0]->save();

        $f = new FeaturedProduct;
        $f->product_id = $product_id;
        $f->category_id = $product[0]->category_id;
        $f->save();

        return redirect("/store-admin/products/1");
    }

    public function noFeaturedProduct($product_id){
        $product = Product::where("id",$product_id)->get();
        $product[0]->featured = 0;
        $product[0]->save();

        $f = featuredProduct::where("product_id",$product_id)->delete();

        return redirect("/store-admin/products/1");
    }

}
