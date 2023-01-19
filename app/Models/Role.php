<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
