<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class Stats extends BaseWidget
{
    protected function getStats(): array
    {
        // Mendapatkan waktu saat ini di zona waktu Asia/Jakarta
        $timezone = new \DateTimeZone('Asia/Jakarta');
        $currentTime = new \DateTime('now', $timezone);
        $formattedTime = $currentTime->format('H:i');

        return [
            Card::make('Unique Views', '192.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-o-arrow-trending-up'),
            Card::make('Bounce Rate', '21%')
                ->description('7% increase')
                ->descriptionIcon('heroicon-o-arrow-trending-down'),
            Card::make('Average Time on Page', $formattedTime)
                ->description('3% increase')
                ->descriptionIcon('heroicon-o-arrow-trending-up'),
        ];
    }
}
