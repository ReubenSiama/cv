<?php

namespace App\Http\Enums;

use Filament\Support\Contracts\HasLabel;

enum EducationExperience: string implements HasLabel
{
    case Education = 'education';
    case Experience = 'experience';

    public function getLabel(): string
    {
        return match ($this) {
            self::Education => 'Education',
            self::Experience => 'Experience',
        };
    }
}
