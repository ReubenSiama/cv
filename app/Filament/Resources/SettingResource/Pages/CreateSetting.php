<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Common\RedirectUrlTrait;
use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    use RedirectUrlTrait;
    
    protected static string $resource = SettingResource::class;
}
