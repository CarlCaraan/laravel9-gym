<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipmentCategory;
use Illuminate\Support\Facades\Redis;

class EquipmentCategoryController extends Controller
{
    public function EquipmentCategoryView()
    {
        $data['allData'] = EquipmentCategory::all();
        return view('admin.inventory_backend.equipment_category.view_equipment_category', $data);
    }

    public function EquipmentCategoryAdd()
    {
        return view('admin.inventory_backend.equipment_category.add_equipment_category');
    }

    public function EquipmentCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $data = new EquipmentCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('equipment.category.view')->with($notification);
    } // End Method 

    public function EquipmentCategoryEdit($id)
    {
        $data['editData'] = EquipmentCategory::find($id);
        return view('admin.inventory_backend.equipment_category.edit_equipment_category', $data);
    }

    public function EquipmentCategoryUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $data = EquipmentCategory::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('equipment.category.view')->with($notification);
    } // End Method

    public function EquipmentCategoryDelete($id)
    {
        $data = EquipmentCategory::find($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('equipment.category.view')->with($notification);
    }
}
