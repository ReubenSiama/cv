<?php

namespace App\Http\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum BlogStatus: string implements HasColor, HasLabel
{
    case DRAFT = 'draft';

    case PUBLISHED = 'published';

    case ARCHIVED = 'archived';

    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
            self::ARCHIVED => 'Archived',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::DRAFT => 'gray',
            self::PUBLISHED => 'success',
            self::ARCHIVED => 'danger',
        };
    }
}
