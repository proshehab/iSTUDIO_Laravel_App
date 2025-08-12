<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroFeature extends Model
{
    protected $fillable = ['hero_id', 'icon', 'title'];

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }
}
