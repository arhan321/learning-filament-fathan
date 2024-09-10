<?php

namespace App\Filament\Resources\ProductPurchaseResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ProductPurchaseResource;

class ListProductPurchases extends ListRecords
{
    protected static string $resource = ProductPurchaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
