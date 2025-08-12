<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
     protected $fillable = ['title', 'highlighted_word', 'subheading'];

    public function images()
    {
        return $this->hasMany(HeroImage::class);
    }

    public function features()
    {
        return $this->hasMany(HeroFeature::class);
    }
}
