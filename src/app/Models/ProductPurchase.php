<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    protected $fillable = [
        'product_id',
        'qty',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // protected $casts = [
    //     'product' => 'array',
    // ];

    // public function getFormattedProductAttribute()
    // {
    //     return collect($this->product)
    //         ->map(function ($product) {
    //             return 'Product ID: ' . $product['product_id'] . ', Qty: ' . $product['qty'] . ', Total: ' . $product['total'];
    //         })
    //         ->implode('<br>'); // Join products with line breaks
    // }
}