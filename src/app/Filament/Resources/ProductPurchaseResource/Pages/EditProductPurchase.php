<?php

namespace App\Filament\Resources\ProductPurchaseResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductPurchaseResource;

class EditProductPurchase extends EditRecord
{
    protected static string $resource = ProductPurchaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
