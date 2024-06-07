<?php

namespace App\Filament\Resources\EducationExperienceResource\Pages;

use App\Filament\Common\RedirectUrlTrait;
use App\Filament\Resources\EducationExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEducationExperience extends CreateRecord
{
    use RedirectUrlTrait;
    protected static string $resource = EducationExperienceResource::class;
}
