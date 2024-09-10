<?php

namespace App\Filament\Resources\WidgetResource\Widgets;

use App\Models\Product;
use App\Models\ProductPurchase; // Pastikan untuk mengimpor model ProductPurchase
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DataProductStock extends BaseWidget
{
    protected function getStats(): array
    {
        // Menghitung total stok produk
        $totalStock = Product::sum('stok'); // Pastikan nama kolom sesuai dengan database
        // Menghitung total produk
        $totalProducts = Product::count(); 
        // Menghitung jumlah produk yang terjual
        $totalSold = ProductPurchase::sum('qty'); // Jumlah total produk yang terjual berdasarkan qty di product_purchases

        return [
            Stat::make('Total Stock', $totalStock)
                ->description('Jumlah total stok produk')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),
            Stat::make('Total Products', $totalProducts)
                ->description('Jumlah total produk yang ada')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),
            Stat::make('Total Sold', $totalSold)
                ->description('Jumlah total produk yang terjual')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('primary'),
        ];
    }
}


