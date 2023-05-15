<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Categoria extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'link','nome',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nome')
            ->saveSlugsTo('link');
    }

    public function jornal(){
        return $this->hasOne(Jornal::class);
    }
}
