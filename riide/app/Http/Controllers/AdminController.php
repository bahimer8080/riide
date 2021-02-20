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

class AdminController extends Controller
{
    //
    public function index(){
        //dd( \Auth::user() );
        return view("admin/store/index");
    }

    public function getStores($pagination){
        $stores = DB::table("store")
            ->select(
                "store.id as store_id",
                "store.name as store_name",
                "store.image as store_image",
                "store.bg_image as store_bg_image",
                "store.state as store_state",
                "users.name as user_name"
            )
            ->join("users","users.id","=","store.user_id")
            ->skip( ($pagination - 1 ) * 2 )
            ->take(10)
            ->get();
        //dd( $stores );
        return view("admin-stores",[
            "stores" => $stores,
            "pagination" => $pagination
        ]);
    }

    public function setStateStore($pagination,$store,$state){
        $store = Store::where("id",$store)->get();
        $store[0]->state = $state;
        $store[0]->save();
        return redirect("/admin/stores/" . $pagination);
    }

    public function getRiders($pagination){
        $riders = DB::table("role_user")
            ->select(
                "*"
            )
            ->where("role_user.role_id","=",3)
            ->join("users","users.id","=","role_user.user_id")
            ->skip( ($pagination - 1 ) * 2 )
            ->take(10)
            ->get();
        //dd($riders);
        return view("admin-riders",[
            "riders" => $riders,
            "pagination" => $pagination
            ]);
    }

    public function setStateRider($pagination,$rider,$state){
        $user = User::where("id",$rider)->get();
        $user[0]->state = $state;
        $user[0]->save();
        return redirect("/admin/riders/" . $pagination);
    }

    public function categories($pagination){
        $categories = DB::table("category")
            ->where("parent_id","=",0)
            ->skip( ($pagination - 1 ) * 2 )
            ->take(10)
            ->get();
        //dd( $catgories );
        return view("admin-categories",[
            "categories" => $categories
        ]);
    }

    public function subcategories($category,$pagination){
        //dd($pagination,$category);
        $cat = DB::table("category")
            ->where("id","=",$category)
            ->get();
        //dd( $category );
        $categories = DB::table("category")
            ->where("parent_id","=",$category)
            ->where("state","=",1)
            ->skip( ($pagination - 1 ) * 2 )
            ->take(10)
            ->get();
        //dd( $categories );
        return view("admin-subcategories",[
            "categories" => $categories,
            "pagination" => $pagination,
            "category" => $category,
            "c" => $cat 
        ]);
    }

    public function categoryDelete($category,$pagination,$id){
        $data = Category::where("id","=",$id)
            ->get();
        $data[0]->state = 0;
        $data[0]->save();
        return redirect("/admin/categories/$category/$pagination");
    }

    public function createCategory($id){
       
        return view("create-categories",[
            "id" => $id
        ]);
    }

    public function postCategory(Request $request){
        $photo = null;
        if( $request->file('image') ){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();

            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $photo = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }
        $category = new Category;
        $category->name = $request->input("name");
        $category->image = $photo;
        $category->parent_id = $request->input("id");
        $category->save();
        return redirect("/admin/categories/" . $request->input("id") ."/1");
        //dd($request);
    }

    public function updateCategory($id){
        $data = DB::table("category")
            ->where("id","=",$id)
            ->get();
        return view("update-categories",[
            "category" => $data[0],
            "id" => $id
        ]);
    }

    public function putCategory(Request $request){
        $category = Category::where("id","=",$request->input("id"))
            ->get();
        $photo = null;
        if( $request->file('image') ){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();

            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $photo = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        } else {
            $photo = $category[0]->image;
        }
        
        $category[0]->name = $request->input("name");
        $category[0]->image = $photo;
        $category[0]->parent_id = $request->input("id");
        $category[0]->save();
        return redirect("/admin/categories/" . $request->input("id") ."/1");
        //dd($request);
    }

    public function adminStore(){
        return view("store-admin");
    }

    public function getSlider($slider_id,$category){

        


        $spaces = DB::table("advertising_space")
            ->where("type","=",strtoupper($category) )
            ->where("id","=",$slider_id)
            ->get();

        $sliders = [];
        foreach( $spaces as $s ){
            $banners = DB::table("advertising_space_banner")
            ->select(
                "banner.image as banner_image",
                "banner.id as banner_id",
                "store.name as store_name"
            )
                ->where("advertising_space_banner.advertising_space_id","=",$s->id)
                ->leftJoin("banner","banner.id","=","advertising_space_banner.banner_id")
                ->join("store","store.id","=","banner.store_id")
                ->get();
                //dd( $banners );
            $sliders[] = [
                "name" => $s->name,
                "banners" => $banners
            ];
        }

        $banners = Banner::select(
            "banner.image as banner_image",
            "banner.id as banner_id",
            "store.name as store_name"
        )
            ->join("store","store.id","=","banner.store_id")
            ->get();
            //dd($spaces);
        //dd($sliders,$banners);
        return view("admin-store-category",[
            "sliders" => $sliders,
            "banners" => $banners,
            "category" => strtolower($spaces[0]->type),
            "slider_id" => $slider_id
        ]);
        //
    }

    public function deleteBannerOfSlider($category,$slider_id,$banner_id){
        $slider = DB::table("advertising_space")
            ->where("type","=",$category)
            ->where("id",$slider_id)
            ->get();

        $banner_slider = AdvertisingSpaceBanner::where("advertising_space_id","=",$slider[0]->id)
            ->where("banner_id","=",$banner_id)
            ->delete();
        return redirect("/admin/store/". $slider[0]->id ."/$category");
        //dd($banner_slider);
    }

    public function assignBannerOfSlider($category,$slider_id,$banner_id){
        $slider = DB::table("advertising_space")
            ->where("type","=",$category)
            ->where("id",$slider_id)
            ->get();

        $banner_slider = new AdvertisingSpaceBanner;
        $banner_slider->advertising_space_id = $slider[0]->id;
        $banner_slider->banner_id = $banner_id;
        $banner_slider->save();
        /*$banner_slider = AdvertisingSpaceBanner::where("advertising_space_id","=",$slider[0]->id)
            ->where("banner_id","=",$banner_id)
            ->delete();*/

        return redirect("/admin/store/". $slider[0]->id ."/$category");
        //dd($banner_slider);
    }

    public function listSliders($category){
        $sliders = DB::table("advertising_space")
            ->where("type","=",strtolower($category) )    
            ->get();
        //dd($sliders);
        return view("list-banners",[
            "sliders" => $sliders,
            "category" => $category
        ]);
    }

    public function createSlider($category){
        $sliders = DB::table("advertising_space")
            ->where("type",$category)
            ->count();
        
        $slider = new AdvertisingSpace;
        $slider->name = "SLIDER " . ($sliders + 1);
        $slider->type = $category;
        $slider->save();
        return redirect("/admin/store/list/sliders/$category");
    }

}
