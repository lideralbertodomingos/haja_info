<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'saldo','codigo','endereco','email','validade','descricao','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
