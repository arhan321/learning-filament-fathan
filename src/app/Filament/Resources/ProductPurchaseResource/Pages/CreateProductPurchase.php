<?php

namespace App\Filament\Resources\ProductPurchaseResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProductPurchaseResource;

class CreateProductPurchase extends CreateRecord
{
    protected static string $resource = ProductPurchaseResource::class;
}
