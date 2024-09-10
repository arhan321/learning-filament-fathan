<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'nama_product' => 'HP',
            'slug' => 'HP',
            'deskripsi' => 'HP mantap',
            'harga' => 10000,
            'stok' => 10,
            // 'gambar' => 'product-1.jpg',
        ]);
    }
}
