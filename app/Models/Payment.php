<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function paymentDetail()
    {
        return $this->hasMany('\App\Models\PaymentDetail');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function vendor()
    {
        return $this->belongsTo('\App\Models\Vendor');
    }
}
