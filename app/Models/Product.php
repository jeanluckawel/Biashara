<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //

    use SoftDeletes;


    protected $fillable = [
        'code',
        'currency',
        'category_id',
        'name',
        'quantity',
        'purchase_price',
        'selling_price',
        'discount',
        'tax',
        'total',

    ];



    public function category()
    {

        return $this->belongsTo(Category::class);

    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
