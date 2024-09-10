<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class test extends ChartWidget
{
    protected static ?string $heading = 'Monthly Blog Posts';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog Posts Created',
                    'data' => [5, 15, 8, 12, 25, 30, 40, 60, 70, 50, 80, 90],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
