<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'content',
        'link',
        'technologies',
        'slug',
        'order_column'
    ];

    protected $casts = [
        'technologies' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function title(): Attribute
    {
        return new Attribute(
            set: fn ($value) => [
                'title' => $value,
                'slug' => Str::slug($value),
            ],
        );
    }
}
