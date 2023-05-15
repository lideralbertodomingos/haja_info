<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegraUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','regra_id'
    ];

    public function usuario(){
        return $this->belongsTo(User::class);
    }
    public function regra(){
        return $this->belongsTo(Regra::class);
    }
}
