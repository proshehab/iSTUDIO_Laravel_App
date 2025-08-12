<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'icon_class',
        'title',
        'description',
        'order',
        'animation_delay',
    ];
}
