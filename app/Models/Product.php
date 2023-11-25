<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function imageProduct()
    {
        return $this->hasMany('\App\Models\ImageProduct');
    }

    public function wishlist()
    {
        return $this->belongsTo('\App\Models\Wishlist');
    }

    public function vendor()
    {
        return $this->belongsTo('\App\Models\Vendor', 'vendor_id');
    }

    public function cart()
    {
        return $this->belongsTo('\App\Models\Cart');
    }

    public function paymentDetail()
    {
        return $this->belongsTo('\App\Models\PaymentDetail');
    }
}
