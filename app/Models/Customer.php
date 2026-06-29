<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //

    Use SoftDeletes;

    protected $fillable = [
        'name', 'phone', 'address',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
