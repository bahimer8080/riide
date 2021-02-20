<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\RoleUser;
use App\Store;
use App\TimeStore;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd( $data );
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        $request = request();

        $photo = null;
        $lc = null;
        $cm = null;
        $ap = null;
        if( $request->file('photo') ){
            $profileImage = $request->file('photo');
            $profileImageSaveAsName = time() . "-profile." . $profileImage->getClientOriginalExtension();

            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $photo = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        if( $request->file('lc') ){
            $profileImage = $request->file('lc');
            $profileImageSaveAsName = time() . "-lc." . $profileImage->getClientOriginalExtension();

            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $lc = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        if( $request->file('cm') ){
            $profileImage = $request->file('cm');
            $profileImageSaveAsName = time() . "-cm." . $profileImage->getClientOriginalExtension();

            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $cm = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        if( $request->file('ap') ){
            $profileImage = $request->file('ap');
            $profileImageSaveAsName = time() . "-ap." . $profileImage->getClientOriginalExtension();

            $upload_path = 'img/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $ap = $profile_image_url;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        
        //dd($data);
        if( intval($data["role_id"]) == 1 ){
            
            $user = new User;
            $user->name = $data['name'];
            $user->phone = $data['phone'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->avatar = $photo;
            $user->rol_id = 1;
            $user->save();
            
            
            RoleUser::create([
                "role_id" =>  intval($data["role_id"]) ,
                "user_id" => $user->id
            ]);
        }
        if( intval($data["role_id"]) == 2 ){
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->dni = $data['type_document'] . "-" .$data['dni'];
            $user->address = $data['address'];
            $user->branches = $data['branches'];
            $user->password = Hash::make($data['password']);
            $user->avatar = $photo;
            $user->rol_id = 2;
            $user->save();
            
            
            $store = new Store;
            $store->user_id = $user->id;
            $store->save();

            for( $i = 1 ; $i <= 7 ; $i++ ){
                $time = new TimeStore;
                $time->store_id = $store->id;
                $time->day = $i;
                $time->save();
            }

            RoleUser::create([
                "role_id" =>  intval($data["role_id"]) ,
                "user_id" => $user->id
            ]);
        }
        if( intval($data["role_id"]) == 3){
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->dni = $data['type_document'] . "-" .$data['dni'];
            $user->address = $data['address'];
            $user->last_work = $data['last_work'];
            $user->last_boss = $data['last_boss'];
            $user->password = Hash::make($data['password']);
            $user->avatar = $photo;
            $user->lc = $lc;
            $user->cm = $cm;
            $user->ap = $ap;
            $user->rol_id = 3;
            $user->save();
            
            RoleUser::create([
                "role_id" =>  intval($data["role_id"]) ,
                "user_id" => $user->id
            ]);
        }

        
        
        return $user;
    }
}
