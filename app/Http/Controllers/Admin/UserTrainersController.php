<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserTrainers;

class UserTrainersController extends Controller
{
    public function UserTrainersView()
    {
        // $allData = User::all();
        $data['allData'] = UserTrainers::all();
        return view('admin.trainers.view_trainers', $data);
    }

    public function UserTrainersAdd()
    {
        return view('admin.trainers.add_trainers');
    }

    public function UserTrainersStore(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'position' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
        ]);

        $data = new UserTrainers();
        $data->name = $request->name;
        $data->position = $request->position;
        $data->facebook_link = $request->facebook_link;
        $data->twitter_link = $request->twitter_link;
        $data->instagram_link = $request->instagram_link;

        // Storing Image
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/trainers'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Trainer Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.trainers.view')->with($notification);
    } // End Method

    public function UserTrainersEdit($id)
    {
        $editData = UserTrainers::find($id);
        return view('admin.trainers.edit_trainers', compact('editData'));
    } // End Method

    public function UserTrainersUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'position' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
        ]);

        $data = UserTrainers::find($id);
        $data->name = $request->name;
        $data->position = $request->position;
        $data->facebook_link = $request->facebook_link;
        $data->twitter_link = $request->twitter_link;
        $data->instagram_link = $request->instagram_link;

        // Updating Image
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_siteinfo/trainers/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/trainers'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Trainer Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.trainers.view')->with($notification);
    } // End Method

    public function UserTrainersDelete($id)
    {
        $data = UserTrainers::find($id);
        @unlink(public_path('upload/user_siteinfo/trainers/' . $data->image));
        $data->delete();

        $notification = array(
            'message' => 'Trainer Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.trainers.view')->with($notification);
    } // End Method

    public function UserTrainersRemoveImage($id)
    {
        $data = UserTrainers::find($id);
        @unlink(public_path('upload/user_siteinfo/trainers/' . $data->image));
        $data->image = NULL;
        $data->save();

        $notification = array(
            'message' => 'Trainer Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.trainers.view')->with($notification);
    }
}
