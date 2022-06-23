<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSiteInfo;

class UserSiteInfoController extends Controller
{
    public function UserSiteInfoEdit()
    {
        $editData = UserSiteInfo::first();
        return view('admin.usersiteinfo.edit_user_siteinfo', compact('editData'));
    }

    public function UserSiteInfoUpdate(Request $request, $id)
    {
        $data = UserSiteInfo::find($id);

        $validatedData = $request->validate(
            [
                'mobile' => 'required',
                'email' => 'required',
                'terms' => 'required',
                'privacy' => 'required',
                'facebook_link' => 'required',
                'twitter_link' => 'required',
                'linkedin_link' => 'required',
                'instagram_link' => 'required',
                'address' => 'required',
                'footer' => 'required',
            ],
        );

        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->terms = $request->terms;
        $data->privacy = $request->privacy;
        $data->facebook_link = $request->facebook_link;
        $data->twitter_link = $request->twitter_link;
        $data->linkedin_link = $request->linkedin_link;
        $data->instagram_link = $request->instagram_link;
        $data->address = $request->address;
        $data->footer = $request->footer;
        $data->save();

        $notification = array(
            'message' => 'User Site Info Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.siteinfo.edit')->with($notification);
    }
}
