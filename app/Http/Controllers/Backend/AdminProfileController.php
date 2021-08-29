<?php

namespace App\Http\Controllers\Backend;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function AdminProfileEdit() {
        $adminData = Admin::find(1);
        return view('admin.admin_profile_edit',compact('adminData'));
    }
    public function AdminProfileStore(Request $request) {
        $request->validate([
            'profile_photo_path' => ['mimes:png,jpg,jpeg'],
            'email' => ['required','email','unique:admins,email,1,id','email'],
            'name' => ['required','min:2','max:255']
        ]);
        $data = Admin::find(1);
        $old_image = $data->profile_photo_path;
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHisu').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data->profile_photo_path = 'upload/admin_images/'.$filename;
            unlink(public_path($old_image));
        }
        $data->save();
        return Redirect('admin/profile')->with('message','Profile updated successfully');
    }
    public function AdminChangePassword() {
        return view('admin.admin_change_passwrod');
    }
    public function AdminUpdateChangePassword(Request $request) {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required','confirmed','min:4','max:255']
        ]);
        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->old_password,$hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return Redirect('admin/logout');
        }else{
            return Redirect::back()->with("validate_message","Password is invalid.");
        }
    }
}
