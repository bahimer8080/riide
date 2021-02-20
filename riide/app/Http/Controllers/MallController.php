<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\RoleUser;
use App\Category;
use App\StoreCategory;
use App\ScoreStore;


class MallController extends Controller
{
    public function index(){

        $banners = DB::table("advertising_space")
            ->select(
                "banner.url as url",
                "banner.image as image"
            )
            ->where("type","=","CATEGORY")
            ->join("advertising_space_banner","advertising_space_banner.advertising_space_id","=","advertising_space.id")
            ->join("banner","banner.id","=","advertising_space_banner.banner_id")
            ->get();
        //dd($banners);
        $data = DB::table('category')
            ->where("category.parent_id","=",0)
            ->join('store_category', 'category.id', '=', 'store_category.category_id')
            ->select('category.id as id', 'category.name as name','category.image as image', DB::raw("count(store_category.category_id) as count"))
            ->groupBy('category.name')
            ->get();
        //dd( $data );
            //dd($banners);
        return view("mall", [
            "categories" => $data,
            "banners" => $banners
        ] );

            

    }

    public function subCategory($id){

        $cat = DB::table("category")
            ->where("id",$id)
            ->get();

        $stores = StoreCategory::where("category_id","=", $id )
            ->join("store","store.id","=","store_category.store_id")
            ->get();
        //dd($cat);
        
        $aCat = [];

        foreach( $stores as $s ){
            //dd($s);
            $score = DB::table("score_store")
                ->where("store_id",$s->id)
                ->sum("score");
            $score_count = DB::table("score_store")
                ->where("store_id",$s->id)
                ->count();
                //dd($score_count,$score);
            if( $score_count == 0 ){
                $s->score = 0;
            }
            else {
                $s->score = $score / $score_count;
            }


            $time = DB::table("time_store")
                ->where("store_id","=",$s->id)
                ->where("day","=",date("N"))
                ->get();
            $s->start = $time[0]->start;
            $s->end = $time[0]->end;
            
        }
        //dd($stores);
        $aCat = [
            
            "category" => $cat[0]->name,
            "category_id" => $id,
            "stores" => $stores
        ];
        //dd($aCat);
        
        $banners = DB::table("advertising_space")
            ->select(
                "banner.url as url",
                "banner.image as image"
            )
            ->where("type","=","SUBCATEGORY")
            ->join("advertising_space_banner","advertising_space_banner.advertising_space_id","=","advertising_space.id")
            ->join("banner","banner.id","=","advertising_space_banner.banner_id")
            ->get();

                

        $categories = DB::table('category')
            ->where("parent_id","=",$id)
            //->join('store_category', 'category.id', '=', 'store_category.category_id')
            ->select('category.id as id', 'category.name as name','category.image as image',)
            ->get();

        //dd( $categories );
        $arrayCat = [];
        $arrayCat[] = $aCat;


/*
$score = DB::table("score_store")
            ->where("store_id",$id)
            ->sum("score");
        $score_count = DB::table("score_store")
            ->where("store_id",$id)
            ->count();
*/


        foreach( $categories as $cat ){
            $stores = StoreCategory::where("category_id","=", $cat->id )
                ->join("store","store.id","=","store_category.store_id")
                ->get();
            //dd($cat);
            
            foreach( $stores as $s ){
                //dd($s);
                $score = DB::table("score_store")
                    ->where("store_id",$s->id)
                    ->sum("score");
                $score_count = DB::table("score_store")
                    ->where("store_id",$s->id)
                    ->count();
                    //dd($score_count,$score);
                if( $score_count == 0 ){
                    $s->score = 0;
                }
                else {
                    $s->score = $score / $score_count;
                }


                $time = DB::table("time_store")
                    ->where("store_id","=",$s->id)
                    ->where("day","=",date("N"))
                    ->get();
                $s->start = $time[0]->start;
                $s->end = $time[0]->end;
                
            }
            //dd($stores);
            $arrayCat[] = [
                
                "category" => $cat->name,
                "category_id" => $cat->id,
                "stores" => $stores
            ];
        }
        //dd($arrayCat,$banners);
        return view("mall-category",[ "categories" => $arrayCat,"banners" => $banners,]);
    }


    public function store($id){
        
        $store = DB::table("store")
            ->where("store.id",$id)
            ->join("time_store","time_store.store_id","=","store.id")
            ->get();

        $score = DB::table("score_store")
            ->where("store_id",$id)
            ->sum("score");
        $score_count = DB::table("score_store")
            ->where("store_id",$id)
            ->count();

        $categories = DB::table("store_category")
            ->select(
                "category.name as name"
            )
            ->where("store_category.store_id","=",$id)
            ->join("category","category.id","=","store_category.category_id")
            ->get();

        $products = DB::table("product")
            ->where("store_id",$id)
            ->get();


         /*dd( [
             $store,$score,$score_count,$categories,$products
         ] );*/
        /*$products = DB::table()

            ->get();*/

        return view("store",[
            "store" => $store,
            "score_sum" => $score,
            "score_count" => $score_count,
            "categories" => $categories,
            "products" => $products
        ]);
    }


    public function product($id){
        $product = DB::table("product")
            ->select(
                "product.id as product_id",
                "product.name as product_name",
                "product.description as product_description",
                "product.image as product_image",
                "product.price_a as product_price_a",
                "product.price_b as product_price_b",
                "store.id as store_id",
                "store.name as store_name",
                "store.image as store_image"
            )
            ->where("product.id",$id)
            ->join("store","store.id","=","product.store_id")
            ->get();

        $related = DB::table("product")
            ->where("id","!=",$id)
            ->where("store_id",$product[0]->store_id)
            ->get();

        //dd( $related );
        return view("product",[
            "product" => $product,
            "related" => $related
        ]);
    }

    public function promotion(){
        $banners = DB::table("advertising_space")
            ->select(
                "banner.url as url",
                "banner.image as image"
            )
            ->where("type","=","PROMOTION")
            ->join("advertising_space_banner","advertising_space_banner.advertising_space_id","=","advertising_space.id")
            ->join("banner","banner.id","=","advertising_space_banner.banner_id")
            ->get();


        $promotion = DB::table("product")
        ->select(
            "product.id as product_id",
            "product.name as product_name",
            "product.image as product_image",
            "product.price_a as product_price_a",
            "product.price_b as product_price_b",
            "store.id as store_id",
            "store.name as store_name",
            "store.image as store_image"
        )
            ->where("product.price_b","!=",null)
            ->join("store","store.id","=","product.store_id")
            ->orderBy("store.name")
            ->get();
            //dd( $promotion );
            
        return view("promotion",[
            "promotion" => $promotion,
            "banners" => $banners
        ]);
        //dd( $promotion );
    }

    public function search($search){

        $banners = DB::table("advertising_space")
            ->select(
                "banner.url as url",
                "banner.image as image"
            )
            ->where("type","=","CATEGORY")
            ->join("advertising_space_banner","advertising_space_banner.advertising_space_id","=","advertising_space.id")
            ->join("banner","banner.id","=","advertising_space_banner.banner_id")
            ->get();

        $s = implode(" " ,explode( "-", $search) );
        //dd($s);
        $categories = DB::table("category")
            ->where("category.name","like","$s%")
            //->join("store_category","store_category.category_id","=","category.id")
            //->join("store","store.id","=","store_category.id")
            ->get();
        //dd($categories);
        $stores = [];
        foreach( $categories as $c ){
            $store = DB::table("store_category")
                ->select(
                    "store.id as store_id",
                    "store.name as store_name",
                    "store.image as store_image",
                    "store_category.category_id as category_id"
                )
                ->where("store_category.category_id","=",$c->id)
                ->join("store","store.id","=","store_category.store_id")
                ->get();
            //dd($store);
            $products = [];
            foreach( $store as $s ){
                $product = DB::table("product")
                    ->where("category_id","=",$s->category_id)
                    ->get();
                $stores[] = [ "store" => $s , "product" => $product ];
            }
            
        }
        //dd( $stores );
            //dd( $dataCategories );
        /*$dataProducts = DB::table("product")
            ->where("name","like",$s . "%")
            ->get();*/
        //dd($dataCategories);
        //dd( $stores[0]["store"] );
        //dd( $banners , $stores );
        return view("search",[
            "banners" => $banners,
            "stores" => $stores
        ]);//$dataCategories;
    }


    public function selectTypeUser(){
        return view("select-type-user");
    }

}
