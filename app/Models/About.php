<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'highlighted_word',
        'image1',
        'image2',
        'image_caption',
        'paragraph1',
        'paragraph2'
    ];

    public function features()
    {
        return $this->hasMany(AboutFeature::class);
    }
}
