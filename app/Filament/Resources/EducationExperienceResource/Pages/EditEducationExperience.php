<?php

namespace App\Filament\Resources\EducationExperienceResource\Pages;

use App\Filament\Common\RedirectUrlTrait;
use App\Filament\Resources\EducationExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationExperience extends EditRecord
{
    use RedirectUrlTrait;
    protected static string $resource = EducationExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
