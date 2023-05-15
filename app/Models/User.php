<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravolt\Avatar\Facade as Avatar;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contacto',
        'cidade',
        'endereco',
        'bilhete',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function Icon($size = 48)
    {
        $initials = $this->name ? substr($this->name, 0, 2) : '??';
        $avatar = Avatar::create($initials)->setBackground('#f4f4f4')->setFontSize(24)->setSize($size);
        return $avatar;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function regra(){
        return $this->hasOne(RegraUser::class);
    }

    public function jornais(){
        return $this->hasMany(Jornal::class);
    }
    public function pagamentos(){
        return $this->hasMany(pagamento::class);
    }

    public function voucher(){
        return $this->hasOne(Voucher::class);
    }
}




