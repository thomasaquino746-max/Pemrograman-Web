<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutgoingProduct extends Model
{
    protected $fillable = [
        'product_id',
        'date',
        'qty',
        'customer',
        'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}