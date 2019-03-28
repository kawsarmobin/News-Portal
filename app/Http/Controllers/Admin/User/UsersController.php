<?php

namespace App\Http\Controllers\Admin\User;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')
            ->with('users', User::where('id','!=',auth()->user()->id)->orderBy('name')->get());
    }

    public function status(User $user)
    {   
        if($user->is_active){
            $user->update(['is_active'=>false]);
            Session::flash('success', 'User Status has been changed successfully');
            
        }else{
            $user->update(['is_active'=>true]);
            Session::flash('success', 'User Status has been changed successfully');
        }
        return redirect()->back();
    }

    public function userRole(User $user)
    {   
        if($user->is_admin){
            $user->update(['is_admin'=>false]);
            Session::flash('success', 'User role has been changed successfully');
            
        }else{
            $user->update(['is_admin'=>true]);
            Session::flash('success', 'User role has been changed successfully');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            Session::flash('success', 'User has been deleted successfully');
        }
        return redirect()->back();
    }
}
