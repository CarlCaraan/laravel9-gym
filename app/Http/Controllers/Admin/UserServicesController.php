<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserServices;

class UserServicesController extends Controller
{
    public function UserServicesView()
    {
        // $allData = User::all();
        $data['allData'] = UserServices::all();
        return view('admin.services.view_services', $data);
    }

    public function UserServicesAdd()
    {
        return view('admin.services.add_services');
    }

    public function UserServicesStore(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'background' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'title' => 'required',
            'body' => 'required',
        ]);

        $data = new UserServices();
        $data->title = $request->title;
        $data->body = $request->body;

        // Storing Image
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/services'), $filename);
            $data['image'] = $filename;
        }
        if ($request->file('background')) {
            $file = $request->file('background');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/services'), $filename);
            $data['background'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Services Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.services.view')->with($notification);
    } // End Method

    public function UserServicesEdit($id)
    {
        $editData = UserServices::find($id);
        return view('admin.services.edit_services', compact('editData'));
    }

    public function UserServicesUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:10000',
            'background' => 'image|mimes:jpeg,png,jpg|max:10000',
            'title' => 'required',
            'body' => 'required',
        ]);

        $data = UserServices::find($id);
        $data->title = $request->title;
        $data->body = $request->body;

        // Updating Image
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_siteinfo/services/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/services'), $filename);
            $data['image'] = $filename;
        }
        if ($request->file('background')) {
            $file = $request->file('background');
            @unlink(public_path('upload/user_siteinfo/services/' . $data->background));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/services'), $filename);
            $data['background'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Services Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.services.view')->with($notification);
    } // End Method

    public function UserServicesDelete($id)
    {
        $data = UserServices::find($id);
        @unlink(public_path('upload/user_siteinfo/services/' . $data->image));
        @unlink(public_path('upload/user_siteinfo/services/' . $data->background));
        $data->delete();

        $notification = array(
            'message' => 'Services Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.services.view')->with($notification);
    }

    public function UserServicesRemoveImage($id)
    {
        $data = UserServices::find($id);
        @unlink(public_path('upload/user_siteinfo/services/' . $data->image));
        $data->image = NULL;
        $data->save();

        $notification = array(
            'message' => 'Service Logo removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.services.view')->with($notification);
    }

    public function UserServicesRemoveBackground($id)
    {
        $data = UserServices::find($id);
        @@unlink(public_path('upload/user_siteinfo/services/' . $data->background));
        $data->background = NULL;
        $data->save();

        $notification = array(
            'message' => 'Background Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.services.view')->with($notification);
    }
}
