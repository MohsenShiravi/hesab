<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cost extends Model
{
    use HasFactory, SoftDeletes;

    private $belongsTo;

    public function costType()
    {
        return $this->belongsTo(CostType::class);
    }

    public function payer()
    {
        return $this->belongsTo(User::class,'payer_id');
    }

    public function confirmer()
    {
        return $this->belongsTo(User::class, 'confirmer_id');
    }

    public function employer()
    {
        return $this->belongsTo(User::class,'employer_id');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class,'payment_type_id');
    }
}
