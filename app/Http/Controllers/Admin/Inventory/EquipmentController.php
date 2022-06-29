<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipmentInventory;
use App\Models\EquipmentCategory;
use App\Models\FacilityCategory;

class EquipmentController extends Controller
{
    public function EquipmentInventoryView()
    {
        $data['allInventories'] = EquipmentInventory::all();
        $data['imageCount'] = EquipmentInventory::where('image', NULL)->count();

        return view('admin.inventory_backend.equipment_inventory.view_equipment_inventory', $data);
    }

    public function EquipmentInventoryAdd()
    {
        $data['equipmentCategories'] = EquipmentCategory::all();
        $data['facilityCategories'] = FacilityCategory::all();
        return view('admin.inventory_backend.equipment_inventory.add_equipment_inventory', $data);
    }

    public function EquipmentInventoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:equipment_inventories',
            'dop' => 'required',
            'facility_id' => 'required',
            'equipment_id' => 'required',
        ]);

        $countEquipment = count($request->equipment_id);
        if ($countEquipment != NULL) {
            for ($i = 0; $i < $countEquipment; $i++) {
                $data = new EquipmentInventory();
                $data->name = $request->name[$i];
                $data->dop = $request->dop[$i];
                $data->facility_id = $request->facility_id;
                $data->equipment_id = $request->equipment_id[$i];
                $data->save();
            } //End For loop
        } // End if
        $notification = array(
            'message' => 'Equipment Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('equipment.inventory.view')->with($notification);
    } // End Method

    public function EquipmentInventoryEdit($id)
    {
        $data['editData'] = EquipmentInventory::find($id);
        $data['equipmentCategories'] = EquipmentCategory::all();
        $data['facilityCategories'] = FacilityCategory::all();
        return view('admin.inventory_backend.equipment_inventory.edit_equipment_inventory', $data);
    }

    public function EquipmentInventoryUpdate(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|unique:equipment_inventories,name,' . $id,
                'dop' => 'required',
                'facility_id' => 'required',
                'equipment_id' => 'required',
            ],
            [
                'name.unique' => 'Equipment Name Already Taken!',
                'name.required' => 'Equipment field is required!'
            ]
        );

        $data = EquipmentInventory::find($id);
        $data->name = $request->name;
        $data->dop = $request->dop;
        $data->facility_id = $request->facility_id;
        $data->equipment_id = $request->equipment_id;

        // Updating Image
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/inventory/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/inventory'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Equipment Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('equipment.inventory.view')->with($notification);
    } // End Method 

    public function EquipmentInventoryDelete($id)
    {
        $data = EquipmentInventory::find($id)->delete();

        $notification = array(
            'message' => 'Equipment Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('equipment.inventory.view')->with($notification);
    } // End Method 

    public function EquipmentInventoryRemoveImage($id)
    {
        $data = EquipmentInventory::find($id);
        @unlink(public_path('upload/inventory/' . $data->image));
        $data->image = NULL;
        $data->save();

        $notification = array(
            'message' => 'Equipment Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('equipment.inventory.view')->with($notification);
    }
}
