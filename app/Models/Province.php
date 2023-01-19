<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'province_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'province_id');
    }
}
