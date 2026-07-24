<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'history', 'vision', 'mission',
        'address', 'phone', 'email',
        'instagram', 'facebook', 'tiktok',
        'logo_url',
        'hero_title', 'hero_subtitle', 'founded_year', 'quote_text', 'sejarah_subtitle'
    ];
}
