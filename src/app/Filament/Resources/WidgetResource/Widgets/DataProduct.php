<?php

namespace App\Filament\Resources\WidgetResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DataProduct extends BaseWidget
{
    protected function getStats(): array
    {
        // Query untuk mendapatkan data pengguna
        $totalUsers = User::count(); // Total jumlah pengguna
        // $activeUsers = User::where('status', 'active')->count(); // Jumlah pengguna aktif
        // $inactiveUsers = User::where('status', 'inactive')->count(); // Jumlah pengguna tidak aktif

        return [
            Stat::make('Total Users', $totalUsers)
                ->description('Total jumlah pengguna terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
            // Stat::make('Active Users', $activeUsers)
            //     ->description('Jumlah pengguna aktif')
            //     ->descriptionIcon('heroicon-m-user-circle')
            //     ->color('success'),
            // Stat::make('Inactive Users', $inactiveUsers)
            //     ->description('Jumlah pengguna tidak aktif')
            //     ->descriptionIcon('heroicon-m-user-x')
            //     ->color('danger'),
        ];
    }
}

