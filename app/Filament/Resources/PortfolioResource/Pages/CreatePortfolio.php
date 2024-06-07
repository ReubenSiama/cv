<?php

namespace App\Filament\Resources\PortfolioResource\Pages;

use App\Filament\Common\RedirectUrlTrait;
use App\Filament\Resources\PortfolioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePortfolio extends CreateRecord
{
    use RedirectUrlTrait;
    
    protected static string $resource = PortfolioResource::class;
}
