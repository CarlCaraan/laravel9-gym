<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAbout;

class UserAboutController extends Controller
{
    public function UserAboutView()
    {
        // $allData = User::all();
        $data['allData'] = UserAbout::all();
        return view('admin.about.view_about', $data);
    }

    public function UserAboutEdit()
    {
        $editData = UserAbout::first();
        return view('admin.about.edit_about', compact('editData'));
    }

    public function UserAboutUpdate(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'image' => 'image|mimes:jpeg,png,jpg|max:5000',
                'background' => 'image|mimes:jpeg,png,jpg|max:5000',
                'title' => 'required',
                'body' => 'required',
            ],
            // ~Custom Error messages
            [
                'image' => 'File format must be JPG, PNG nad JPeG!',
            ]
        );

        $data = UserAbout::find($id);
        $data->title = $request->title;
        $data->body = $request->body;

        // Updating Image
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_siteinfo/about/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/about'), $filename);
            $data['image'] = $filename;
        }
        if ($request->file('background')) {
            $file = $request->file('background');
            @unlink(public_path('upload/user_siteinfo/about/' . $data->background));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/about'), $filename);
            $data['background'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'About Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.about.edit')->with($notification);
    } // End Method

    public function UserAboutRemoveImage()
    {
        $data = UserAbout::first();
        @unlink(public_path('upload/user_siteinfo/about/' . $data->image));
        $data->image = NULL;
        $data->save();

        $notification = array(
            'message' => 'About Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.about.edit')->with($notification);
    } // End Method

    public function UserAboutRemovebackground()
    {
        $data = UserAbout::first();
        @unlink(public_path('upload/user_siteinfo/about/' . $data->background));
        $data->background = NULL;
        $data->save();

        $notification = array(
            'message' => 'About Background removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.about.edit')->with($notification);
    }
}
