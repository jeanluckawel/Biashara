<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArrivalDetail extends Model
{
    //

    protected $fillable = [
        'arrival_id', 'product_id', 'quantity', 'purchase_price', 'subtotal', 'deleted_at',
    ];

    public function arrival()
    {
        return $this->belongsTo(Arrival::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
