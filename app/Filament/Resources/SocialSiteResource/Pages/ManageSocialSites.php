<?php

namespace App\Filament\Resources\SocialSiteResource\Pages;

use App\Filament\Resources\SocialSiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSocialSites extends ManageRecords
{
    protected static string $resource = SocialSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->modalWidth('md'),
        ];
    }
}
