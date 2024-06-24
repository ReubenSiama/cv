<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'visited_at',
        'visited_route',
        'countryName',
        'currencyCode',
        'countryCode',
        'regionCode',
        'regionName',
        'cityName',
        'zipCode',
        'isoCode',
        'postalCode',
        'latitude',
        'longitude',
        'metroCode',
        'areaCode',
        'timezone',
    ];

    public function visitedPages()
    {
        return $this->hasMany(VisitedPage::class);
    }
}
