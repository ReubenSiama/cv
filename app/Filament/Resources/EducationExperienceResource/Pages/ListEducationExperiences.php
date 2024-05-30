<?php

namespace App\Filament\Resources\EducationExperienceResource\Pages;

use App\Filament\Resources\EducationExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationExperiences extends ListRecords
{
    protected static string $resource = EducationExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
