<?php

namespace App\Filament\Resources\SavingConstraintResource\Pages;

use App\Filament\Resources\SavingConstraintResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSavingConstraints extends ManageRecords
{
    protected static string $resource = SavingConstraintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->modalWidth('md'),
        ];
    }
}
