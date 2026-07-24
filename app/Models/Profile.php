<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'history', 'vision', 'mission',
        'address', 'phone', 'email',
        'instagram', 'facebook', 'tiktok',
        'logo_url'
    ];
}
