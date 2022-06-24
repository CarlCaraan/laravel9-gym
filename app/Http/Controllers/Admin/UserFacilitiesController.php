<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserFacilities;

class UserFacilitiesController extends Controller
{
    public function UserFacilitiesView()
    {
        // $allData = User::all();
        $data['allData'] = UserFacilities::all();
        return view('admin.facilities.view_facilities', $data);
    }

    public function UserFacilitiesAdd()
    {
        return view('admin.facilities.add_facilities');
    }

    public function UserFacilitiesStore(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $data = new UserFacilities();
        $data->name = $request->name;
        $data->title = $request->title;
        $data->body = $request->body;

        // Storing Image
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/facilities'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Facility Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.facilities.view')->with($notification);
    } // End Method

    public function UserFacilitiesEdit($id)
    {
        $editData = UserFacilities::find($id);
        return view('admin.facilities.edit_facilities', compact('editData'));
    } // End Method

    public function UserFacilitiesUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $data = UserFacilities::find($id);
        $data->name = $request->name;
        $data->title = $request->title;
        $data->body = $request->body;

        // Updating Image
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_siteinfo/facilities/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/facilities'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Facility Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.facilities.view')->with($notification);
    } // End Method

    public function UserFacilitiesDelete($id)
    {
        $data = UserFacilities::find($id);
        @unlink(public_path('upload/user_siteinfo/facilities/' . $data->image));
        $data->delete();

        $notification = array(
            'message' => 'Facility Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.facilities.view')->with($notification);
    } // End Method

    public function UserFacilitiesRemoveImage($id)
    {
        $data = UserFacilities::find($id);
        @unlink(public_path('upload/user_siteinfo/facilities/' . $data->image));
        $data->image = NULL;
        $data->save();

        $notification = array(
            'message' => 'Facility Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.facilities.view')->with($notification);
    }
}
