<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroImage extends Model
{
    protected $fillable = ['hero_id', 'image_path'];

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }
}
