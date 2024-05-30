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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if($data['is_read'] === false){
            Message::find($data['id'])->update(['is_read' => true]);
        }
        return $data;
    }
}
