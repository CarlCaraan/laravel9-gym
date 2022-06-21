<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        // $allData = User::all();
        $data['allData'] = User::all();
        return view('admin.user.view_user', $data);
    }

    public function UserAdd()
    {
        return view('admin.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'user_type' => 'required',
        ]);

        $data = new User();
        $code = "password";
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->user_type = $request->user_type;
        $data->password = bcrypt($code);

        // Storing Image
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.view')->with($notification);
    }
}
