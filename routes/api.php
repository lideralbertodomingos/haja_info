<?php

use App\Models\Jornal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/',function(){
    return Jornal::all();
});

Route::get('jornal/{link}',function($link){
    return Jornal::where('link', $link)->first();
});


Route::get('jornal/{link}/imagem',function($link){
    return Jornal::where('link', $link)->first()->imagem;
});

