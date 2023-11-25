<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->hasMany('\App\Models\Product', 'vendor_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function bankAccount()
    {
        return $this->belongsTo('\App\Models\BankAccount');
    }

    public function payment()
    {
        return $this->belongsTo('\App\Models\Payment');
    }
}
