<?php

namespace App\Filament\Resources\EducationExperienceResource\Pages;

use App\Filament\Resources\EducationExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationExperience extends EditRecord
{
    protected static string $resource = EducationExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getRedirectLink(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
