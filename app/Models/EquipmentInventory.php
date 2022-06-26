<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentInventory extends Model
{
    public function equipment_category()
    {
        return $this->belongsTo(EquipmentCategory::class, 'equipment_id', 'id');
    }
    public function facility_category()
    {
        return $this->belongsTo(FacilityCategory::class, 'facility_id', 'id');
    }
}
