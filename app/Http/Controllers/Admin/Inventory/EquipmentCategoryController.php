<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipmentCategory;
use App\Models\EquipmentInventory;

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
        $validatedData = $request->validate(
            [
                'name' => 'required|unique:equipment_categories',
            ],
            [
                'name.unique' => 'Equipment Type Already Taken!',
                'name.required' => 'Equipment Type field is required!'
            ]
        );

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
        $validatedData = $request->validate(
            [
                'name' => 'required|unique:equipment_categories,name,' . $id,
            ],
            [
                'name.unique' => 'Equipment Type Already Taken!',
                'name.required' => 'Equipment Type field is required!'
            ]
        );

        // Dont Update if Associated to some post
        $inventoryData = EquipmentInventory::where('equipment_id', $id)->get();
        if (count($inventoryData) != 0) {
            $notification = array(
                'message' => 'Category is associated to some equipments!',
                'alert-type' => 'error',
            );
            return redirect()->route('equipment.category.view')->with($notification);
        }

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
        $inventoryData = EquipmentInventory::where('equipment_id', $id)->get();
        if (count($inventoryData) != 0) {
            $notification = array(
                'message' => 'Category is associated to some equipments!',
                'alert-type' => 'error',
            );
            return redirect()->route('equipment.category.view')->with($notification);
        }

        $data = EquipmentCategory::find($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('equipment.category.view')->with($notification);
    }
}
