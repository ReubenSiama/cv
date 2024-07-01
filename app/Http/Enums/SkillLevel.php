<?php

namespace App\Http\Enums;

use Filament\Support\Contracts\HasLabel;

enum SkillLevel: string implements HasLabel
{
    case Novice = 'novice';
    case Intermediate = 'intermediate';
    case Proficient = 'proficient';
    case Expert = 'expert';

    public function getLabel(): string
    {
        return match ($this) {
            self::Novice => 'Novice',
            self::Intermediate => 'Intermediate',
            self::Proficient => 'Proficient',
            self::Expert => 'Expert',
        };
    }
}
