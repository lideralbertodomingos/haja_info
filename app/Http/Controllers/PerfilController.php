<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $vouchers = $user->vouchers;
        return view('pages.perfil.index');
    }

    public function voucher()
    {
        if(!Auth::user()->voucher){
            return redirect()->route('perfil.voucher.create');
        }
        return view('pages.perfil.index');
    }

    public function voucher_create()
    {
        return view('pages.perfil.voucher.create');
    }


    public function voucher_store(Request $request)
    {
        // Validar os campos recebidos
        $validatedData = $request->validate([
            'saldo' => 'required|numeric',
            'codigo' => 'required|unique:vouchers,codigo',
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|unique:vouchers,email',
            'validade' => 'required|date',
            'descricao' => 'nullable|string|max:255',
            'user_id' => 'required|integer'
        ]);

        // Criar a carteira apenas se os dados são válidos
        $carteira = Voucher::create($validatedData);

        if ($carteira) {
            // Se a carteira foi criada com sucesso, retorna uma resposta JSON com status "success"
            return response()->json([
                'status' => 'success',
                'message' => 'Carteira criada com sucesso'
            ]);
        } else {
            // Se ocorrer algum erro ao criar a carteira, retorna uma resposta JSON com status "error"
            return response()->json([
                'status' => 'error',
                'message' => 'Erro ao criar a carteira'
            ]);
        }
    }


    public function voucher_carregar()
    {
        return view('perfil');
    }

    public function edit()
    {
        return view('pages.perfil.edit');
    }

    public function atualizar()
    {
        return view('perfil.atualizar');
    }
}
