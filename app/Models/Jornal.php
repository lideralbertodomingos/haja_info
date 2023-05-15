<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Jornal extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'link','titulo','descricao',
        'imagem','user_id','status',
        'categoria_id','preco','visibilidade'
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('link');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pagamento(){
        return $this->hasOne(pagamento::class);
    }
}
