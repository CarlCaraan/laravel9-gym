<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityCategory;

class FacilityCategoryController extends Controller
{
    public function FacilityCategoryView()
    {
        $data['allData'] = FacilityCategory::all();
        return view('admin.inventory_backend.facilities_category.view_facility_category', $data);
    }

    public function FacilityCategoryAdd()
    {
        return view('admin.inventory_backend.facilities_category.add_facility_category');
    }

    public function FacilityCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $data = new FacilityCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('facility.category.view')->with($notification);
    } // End Method 

    public function FacilityCategoryEdit($id)
    {
        $data['editData'] = FacilityCategory::find($id);
        return view('admin.inventory_backend.facilities_category.edit_facility_category', $data);
    }

    public function FacilityCategoryUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $data = FacilityCategory::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('facility.category.view')->with($notification);
    } // End Method

    public function FacilityCategoryDelete($id)
    {
        $data = FacilityCategory::find($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('facility.category.view')->with($notification);
    }
}
