<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Regra extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'link','nome','descricao'
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nome')
            ->saveSlugsTo('link');
    }

    public function regras(){
        return $this->hasOne(RegraUser::class);
    }
    public function pivos(){
        return $this->hasMany(Permissao::class);
    }
}
