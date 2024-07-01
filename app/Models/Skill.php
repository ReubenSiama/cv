<?php

namespace App\Models;

use App\Http\Enums\SkillLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'percentage',
        'level',
    ];

    protected $casts = [
        'level' => SkillLevel::class,
    ];
}
