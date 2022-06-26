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
            'name' => 'required',
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
    }
}
