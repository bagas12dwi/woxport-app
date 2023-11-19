<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function payment()
    {
        return $this->belongsTo('\App\Models\Payment');
    }

    public function product()
    {
        return $this->belongsTo('\App\Models\Product');
    }
}
