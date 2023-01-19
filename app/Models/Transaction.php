<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class );
    }

    public function payer()
    {
        return $this->belongsTo(User::class,'payer_id');
    }

    public function payee()
    {
        return $this->belongsTo(User::class,'payee_id');
    }
}
