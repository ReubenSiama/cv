<?php

namespace App\Filament\Widgets;

use App\Models\Message;
use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingIntereval = null;
    
    protected function getStats(): array
    {
        return [
            Stat::make('New Messages', Message::unread()->count()),
            Stat::make('Visitors', Visitor::where('visited_at', '>=', now()->subDays(7))->count()),
        ];
    }
}
