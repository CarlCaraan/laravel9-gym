<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function all_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
