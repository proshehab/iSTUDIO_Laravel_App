<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
        'about_text',
        'address',
        'phone',
        'email',
        'twitter',
        'facebook',
        'youtube',
        'instagram',
        'linkedin',
    ];
}
