<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use App\Models\Message;
use Filament\Resources\Pages\ViewRecord;

class ViewMessage extends ViewRecord
{
    protected static string $resource = MessageResource::class;

    public function getHeading(): string
    {
        return $this->record->subject;
    }

    public function mount(int|string $record): void
    {
        parent::mount($record);

        $this->record->markAsRead();
    }
}
