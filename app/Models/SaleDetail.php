<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleDetail extends Model
{
    //

    use softDeletes;

    protected $fillable = [
        'sale_id', 'product_id', 'quantity', 'unit_price', 'discount', 'subtotal',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }



    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
