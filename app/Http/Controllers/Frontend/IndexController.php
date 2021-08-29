<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view(('frontend.profile.user_profile'),compact('user'));
    }
    public function UserProfileStore(Request $request)
    {
        $data = User::find(1);
        $old_image = $data->profile_photo_path;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHis ').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data->profile_photo_path = 'upload/user_images/'.$filename;
            if($old_image) unlink(public_path($old_image));
        }
        $data->save();
        return Redirect('dashboard')->with('message','Profile updated successfully');

    }
    public function UserChangePassword()
    {
        $user = User::find(Auth::id());
        return view('frontend.profile.change_password',compact('user'));
    }
    public function UserPasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['min:6','required_with:password_confirmation'],
            'password_confirmation' => ['min:6','same:password']
        ]);
        $password = Auth::user()->password;
        if(Hash::check($request->old_password,$password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('user.logout');
        }else{
            return Redirect()->back()->with('error','Current Password is invalid!');
        }
    }
}
