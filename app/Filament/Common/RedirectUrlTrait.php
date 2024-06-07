<?php

namespace App\Filament\Common;

trait RedirectUrlTrait
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
