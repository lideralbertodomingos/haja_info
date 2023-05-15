<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permissao;
use App\Models\PermissaoRegra;
use App\Models\Regra;
use App\Models\RegraUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRouterController extends Controller
{
    public function index(){
        $user = User::all();
        $regras = Regra::all();
        return view('pages.admin.index', compact('user','regras'));
    }

    public function usuarios(){
        $usuarios = User::paginate(12);
        return view('pages.admin.usuarios', compact('usuarios'));
    }

    public function usuario($id){
        $usuario = User::find($id);
        $regras = Regra::all();
        return view('pages.admin.usuario', compact('usuario','regras'));
    }

    public function regra(Request $request){
        $user = User::find($request->user_id);
        if(!empty($user->regra)){
            $regra = $user->regra;
            $regra->regra_id = $request->regra_id;
            $regra->save();
        }else{
            $regra = RegraUser::create($request->all());
        }

        return redirect()->route('admin.usuarios');
    }

    public function regra_nova(){
        $regras = Regra::all();
        $permissaos = Permissao::all();

        return view('pages.admin.regra_permissao', compact('regras','permissaos'));
    }

    public function regra_index(){
        $regras = PermissaoRegra::all();
        return view('pages.admin.regra_index', compact('regras'));
    }


    public function store(Request $request){
        $regra = PermissaoRegra::create($request->all());
        return redirect()->route('admin.nova.permissao');
    }
}
