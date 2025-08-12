<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image',
        'project_count',
        'link',
        'order',
        'animation_delay',
    ];
}
