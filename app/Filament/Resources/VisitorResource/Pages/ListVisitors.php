<?php

namespace App\Filament\Resources\VisitorResource\Pages;

use App\Filament\Resources\VisitorResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;

class ListVisitors extends ListRecords
{
    protected static string $resource = VisitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('sync-location')->label('Sync Location')
            ->action(fn() => Artisan::call('sync:locations'))
            ->after(function(){
                Notification::make()
                    ->success()
                    ->title('Location Synced Successfully.')
                    ->send();
            }),
        ];
    }
}
