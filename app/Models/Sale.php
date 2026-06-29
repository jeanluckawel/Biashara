<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    //
    use softDeletes;

    protected $fillable = [
        'customer_id', 'user_id', 'reference', 'sale_date', 'total_amount', 'paid_amount', 'currency', 'payment_method', 'status',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }



    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
