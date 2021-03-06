<?php

namespace App\Http\Controllers\Auth;


use Image;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Config;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->redirectTo = config('topics.topic_post_check') ? '/all-topic' : '/';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'website' => 'nullable|url',
            'sub_title' => 'nullable|string|min:2',
            'avatar' => 'nullable|max:1024|mimes:jpeg,jpg,png'
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
        $avatar = $data['avatar']??null;

        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'website'   => $data['website'],
            'sub_title' => $data['sub_title'],
            'avatar'    => $avatar?$this->uploadAvatar($avatar):null,
        ]);
    }

    private function uploadAvatar($avatar)
    {
        $user = auth()->user();

        $avatar_name = rand(10,99).time() . '.' .$avatar->getClientOriginalExtension();

        if (!file_exists(public_path(User::THUMBNAIL_PATH))) {
            mkdir(public_path(User::THUMBNAIL_PATH), 0777, true);
        }

        //Upload File
        $avatar->move('public/'.User::PATH, $avatar_name);
        copy('public/'.User::PATH.'/'.$avatar_name, 'public/'.User::THUMBNAIL_PATH.'/'.$avatar_name);


        //Resize image here
        $thumbnailpath = public_path(User::THUMBNAIL_PATH.'/'.$avatar_name);
        
        Image::make($thumbnailpath)->resize(64, 64)->save($thumbnailpath);

        return $avatar_name;
    }
}
