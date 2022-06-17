<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('admin.profile.view_profile', compact('user'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.profile.edit_profile', compact('editData'));
    }

    public function ProfileUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'user_type' => 'required',
        ]);

        $data = User::find(Auth::user()->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->user_type = $request->user_type;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('profile.view')->with($notification);
    } //End Method

    public function PasswordEdit()
    {
        return view('admin.profile.edit_password');
    }

    public function PasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = array(
                'message' => 'User Password Updated Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('admin.logout')->with($notification);
        } else {
            $notification = array(
                'message' => 'Current Password Incorrect!',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }
    }
}
