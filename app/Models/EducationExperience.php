<?php

namespace App\Models;

use App\Http\Enums\EducationExperience as EnumsEducationExperience;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'subtitle',
        'start_date',
        'end_date',
        'content',
        'link',
        'location',
    ];

    protected $casts = [
        'type' => EnumsEducationExperience::class,
    ];

    public function scopeEducation()
    {
        return $this->where('type', EnumsEducationExperience::Education);
    }

    public function scopeExperience()
    {
        return $this->where('type', EnumsEducationExperience::Experience);
    }
}
