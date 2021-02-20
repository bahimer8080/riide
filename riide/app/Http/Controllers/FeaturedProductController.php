<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\FeaturedProduct;
use App\Product;
use App\AdvertisingSpace;
use App\AdvertisingSpaceBanner;
use App\Banner;
use App\Category;

class FeaturedProductController extends Controller
{
    //
    public function getFeaturedProduct(){
        
       // dd(  date("N") );
        $category = DB::table('category')
        ->where("category.parent_id","=",0)
        ->join('store_category', 'category.id', '=', 'store_category.category_id')
        ->select('category.id as id', 'category.name as name','category.image as image', DB::raw("count(store_category.category_id) as count"))
        ->groupBy('category.name')
        ->get();
        //dd($category);
        //Category::all();

        $space = AdvertisingSpace::where("type","FEATURED")->get();
        $banners = [];
        //dd($space);
        foreach ($space as $s) {
            $banner = AdvertisingSpaceBanner::select(
                    "banner.id",
                    "banner.image as image",
                    "banner.url as url"
                )
                ->where("advertising_space_banner.advertising_space_id","=",$s->id)
                ->join("banner","banner.id","=","advertising_space_banner.banner_id")
                ->get();
                //dd($banner);
            $banners[] = [
                "name" => $s->name,
                "banner" => $banner
            ];
        }
        //dd($banners);
        //dd($banner);


        $featured = FeaturedProduct::select(
            "featured_product.category_id",
            "category.name"
        )
            ->join("category","featured_product.category_id","=","category.id")
            ->groupBy("featured_product.category_id")
            ->get();
            //dd($featured[0]);

        $featuredArray = [];
        foreach( $featured as $f ){
            $featured_product = FeaturedProduct::select(
                    "product.id as product_id",
                    "product.name as product_name",
                    "product.price_a as product_price_a",
                    "product.price_b as product_price_b",
                    "product.image as product_image",
                    "store.name as store_name",
                )
                ->where("featured_product.category_id",$f["category_id"])
                //->where("time_store.day","=", date("N") )
                ->join("product","product.id","=","featured_product.product_id")
                ->join("store","store.id","=","product.store_id")
                //->leftJoin("time_store","time_store.store_id","=","store.id")
                ->get();

                //dd( $featured_product );

            $featuredArray[] = [
                "category" => $f["name"],
                "products" => $featured_product
            ];
        }

        /*$score = DB::table("score_store")
            ->where("store_id",$id)
            ->sum("score");
        $score_count = DB::table("score_store")
            ->where("store_id",$id)
            ->count();*/


        //dd([ "category" => $category , "banners" => $banners, "featured" => $featuredArray]);
        //dd( $banners );
        //dd([ "category" => $category , "banners" => $banners, "featured" => $featuredArray ]);
        return view("featured-product",[ "category" => $category , "banners" => $banners, "featured" => $featuredArray ]);
    }
}
