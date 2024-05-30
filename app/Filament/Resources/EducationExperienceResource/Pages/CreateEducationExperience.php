<?php

namespace App\Filament\Resources\EducationExperienceResource\Pages;

use App\Filament\Resources\EducationExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEducationExperience extends CreateRecord
{
    protected static string $resource = EducationExperienceResource::class;

    public function getRedirectLink(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
