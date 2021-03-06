<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminSiteInfo;

class AdminSiteInfoController extends Controller
{
    public function AdminSiteInfoEdit()
    {
        $editData = AdminSiteInfo::first();
        return view('admin.siteinfo.edit_admin_siteinfo', compact('editData'));
    }

    public function AdminSiteInfoUpdate(Request $request, $id)
    {
        $data = AdminSiteInfo::find($id);

        $validatedData = $request->validate(
            [
                'footer' => 'required',
                'admin_brand' => 'image|mimes:jpeg,png,jpg|max:2048',
                'admin_brand_mini' => 'image|mimes:jpeg,png,jpg|max:2048',
            ],
            // ~Custom Error messages
            [
                'image' => 'File format must be JPG, PNG nad JPeG!',
            ]
        );

        $data->footer = $request->footer;

        // Working with Image
        if ($request->file('admin_brand')) {
            $file = $request->file('admin_brand');
            @unlink(public_path('upload/admin_siteinfo/' . $data->admin_brand));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_siteinfo'), $filename);
            $data['admin_brand'] = $filename;
        }
        if ($request->file('admin_brand_mini')) {
            $file = $request->file('admin_brand_mini');
            @unlink(public_path('upload/admin_siteinfo/' . $data->admin_brand_mini));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_siteinfo'), $filename);
            $data['admin_brand_mini'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Site Info Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.siteinfo.edit')->with($notification);
    }

    public function RemoveAdminBrand()
    {
        $data = AdminSiteInfo::first();
        @unlink(public_path('upload/admin_siteinfo/' . $data->admin_brand));
        $data->admin_brand = NULL;
        $data->save();

        $notification = array(
            'message' => 'Admin Brand Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.siteinfo.edit')->with($notification);
    }
    public function RemoveAdminBrandMini()
    {
        $data = AdminSiteInfo::first();
        @unlink(public_path('upload/admin_siteinfo/' . $data->admin_brand_mini));
        $data->admin_brand_mini = NULL;
        $data->save();

        $notification = array(
            'message' => 'Admin Brand Mini Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.siteinfo.edit')->with($notification);
    }
}
