<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipmentInventory;
use App\Models\EquipmentCategory;
use App\Models\FacilityCategory;

class StocksController extends Controller
{
    public function StockInventoryEdit()
    {
        $data['equipmentInventories'] = EquipmentInventory::all();
        $data['equipmentCategories'] = EquipmentCategory::all();
        $data['facilityCategories'] = FacilityCategory::all();
        return view('admin.inventory_backend.stock_inventory.edit_stock_inventory', $data);
    }

    // Get Equipment Select Options
    public function GetEquipment(Request $request)
    {
        $facility_id = $request->facility_id;
        $allData = EquipmentInventory::with(['equipment_category'])->where('facility_id', $facility_id)->get();

        return response()->json($allData);
    }

    // Get JSON Table
    public function GetTable(Request $request)
    {
        $facility_id = $request->facility_id;
        $equipment_id = $request->equipment_id;
        $allData = EquipmentInventory::where('facility_id', $facility_id)->where('equipment_id', $equipment_id)->get();

        return response()->json($allData);
    }

    public function StockInventoryUpdate(Request $request)
    {
        $validatedData = $request->validate([
            // 'equipment_id' => 'required',
            // 'facility_id' => 'required',
            // 'name' => 'required',
            // 'dop' => 'required',
            // 'quantity' => 'required',
        ]);

        EquipmentInventory::where('facility_id', $request->facility_id)
            ->where('equipment_id', $request->equipment_id)->delete();

        $equipment_id_count = $request->equipment_id;
        if ($equipment_id_count) {
            for ($i = 0; $i < count($equipment_id_count); $i++) {
                $data = new EquipmentInventory();
                $data->equipment_id = $request->equipment_id[$i];
                $data->facility_id = $request->facility_id[$i];
                $data->name = $request->name[$i];
                $data->dop = $request->dop[$i];
                $data->quantity = $request->quantity[$i];
                $data->save();
            } // End for loop
        } // End if condition

        $notification = array(
            'message' => 'Equipment Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
