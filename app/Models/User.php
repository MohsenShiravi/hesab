<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function warehousesIOwn()
    {
        return $this->hasMany(Warehouse::class, 'owner_id');
    }

    public function warehousesIKeeper()
    {
        return $this->hasMany(Warehouse::class, 'keeper_id');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()
            ->withPivot('purchase_price', 'sales_price',
                'is_active', 'count_in_package',
                'minimum_stock', 'description');
    }

    public function costTypes()
    {
        return $this->hasMany(CostType::class);
    }

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}
