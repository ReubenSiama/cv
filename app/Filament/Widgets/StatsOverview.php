<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MessageResource;
use App\Filament\Resources\VisitorResource;
use App\Models\Message;
use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;
    
    protected function getStats(): array
    {
        return [
            Stat::make('New Messages', Message::unread()->count())
            ->description('Total unread messages out of ' . Message::count())
            ->url(MessageResource::getUrl('index'). '?tableFilters[is_read][value]=0'),
            Stat::make('Visitors Today', Visitor::where('visited_at', 'like', date('Y-m-d') . '%')->count())
            ->description('Total visitors today'),
        ];
    }
}
