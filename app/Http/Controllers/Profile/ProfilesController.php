<?php

namespace App\Http\Controllers\Profile;

use Image;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index')
                ->with('profile', auth()->user());
    }

    public function updateProfile()
    {
        return view('profile.update')
                ->with('profile', auth()->user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'website' => 'nullable|url',
            'sub_title' => 'nullable|string|min:2',
            'avatar' => 'nullable|max:1024|mimes:jpeg,jpg,png'
        ]);

        $attributes = $request->only(['name','email','website','sub_title']);
        
        if($request->hasFile('avatar')) {
            $attributes['avatar'] = $this->uploadAvatar($request->avatar);
        }

        if($user->update($attributes)){
            Session::flash('success','Information has been updated successfully');
        }
        return redirect()->route('profile.index');
    }

    private function uploadAvatar($avatar)
    {
        $user = auth()->user();

        if ($user->avatar) {
            $avatar_name = $user->avatar;
        } else {
            $avatar_name = rand(10,99).time() . '.' .$avatar->getClientOriginalExtension();
        }

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

    public function change_password()
    {
        return view('profile.change_password');
    }

    public function update_password(Request $request)
    {
        $user = auth()->user();
        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($user->update(['password' => bcrypt($request->password)])){
            Session::flash('success','Password has been changed successfully');
        }
        auth()->logout();
        return redirect()->route('login');
    }
}
