<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'content',
        'description',
        'weight',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()
            ->withPivot('purchase_price', 'sales_price',
                'is_active', 'count_in_package',
                'minimum_stock', 'description');
    }

}
