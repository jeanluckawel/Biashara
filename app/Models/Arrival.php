<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arrival extends Model
{
    //

    Use SoftDeletes;





    protected $fillable = [

        'supplier_id', 'arrival_date', 'reference', 'status', 'total_amount', 'user_id',

    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }



    public function details()
    {
        return $this->hasMany(ArrivalDetail::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
