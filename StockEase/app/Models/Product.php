<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'code',
        'stock',
        'price',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function outgoingProducts()
{
    return $this->hasMany(OutgoingProduct::class);
}

    public function incomingProducts()
{
    return $this->hasMany(IncomingProduct::class);
}
}