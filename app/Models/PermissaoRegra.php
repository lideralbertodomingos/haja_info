<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissaoRegra extends Model
{
    use HasFactory;
    protected $fillable = [
        'permissao_id','regra_id'
    ];

    public function regra(){
        return $this->belongsTo(Regra::class);
    }

    public function permissao(){
        return $this->belongsTo(Permissao::class);
    }
}
