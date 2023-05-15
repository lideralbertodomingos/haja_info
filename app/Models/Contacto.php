<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Contacto extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'link','nome','email',
        'assunto','contacto',
        'mensagem'
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nome')
            ->saveSlugsTo('link');
    }
}
