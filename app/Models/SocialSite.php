<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSite extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'url'];
}
