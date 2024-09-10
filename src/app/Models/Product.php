<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_product',
        'slug',
        'deskripsi',
        'category',
        'harga',
        'stok',
        'gambar',
    ];

    //ini adalah relasi one to many
    public function product_purchases()
    {
        return $this->hasMany(ProductPurchase::class);
    }
    
}
