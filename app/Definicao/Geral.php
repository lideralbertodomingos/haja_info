<?php

namespace App\Definicao;

use App\Models\Categoria;
use App\Models\Jornal;
use Carbon\Carbon;

class Geral
{
    public static function data(){
        $data = Carbon::now()->locale('pt_BR')->format('l, F j, Y');
    }

    public static function DataF($data) {
        return Carbon::parse($data)->locale('pt_BR')->isoFormat('dddd, DD MMMM, YYYY');
    }

    public static function Jornal($limit){
        return Jornal::limit($limit)->get();
    }

    public static function Categoria($limit){
        return Categoria::limit($limit)->get();
    }

    public static function generateToken($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, $charactersLength - 1)];
        }
        return $token;
    }
}
