<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Jornal;
use App\Models\Newsletter;
use App\Models\pagamento;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $jornais = Jornal::where('visibilidade', 'publica')->paginate(12);
        return view('pages.home.index', compact('jornais'));
    }

    public function sobre()
    {
        return view('pages.home.sobre');
    }

    public function contact()
    {
        return view('pages.home.contacto');
    }

    public function contacto(Request $request)
    {

        $contato = new Contacto;
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->contacto = $request->input('contacto');
        $contato->assunto = $request->input('assunto');
        $contato->mensagem = $request->input('mensagem');

        if ($contato->save()) {
            return response()->json(['status' => 'success', 'message' => 'Mensagem enviada com sucesso!']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Falha ao enviar mensagem. Por favor, tente novamente.']);
        }
    }

    public function Newsletter(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:newsletters'
        ]);

        $contato = new Newsletter();
        $contato->email = $request->input('email');
        if ($contato->save()) {
            return response()->json(['status' => 'success', 'message' => 'Subscrição com sucesso!']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Falha ao subscriver. Por favor, tente novamente.']);
        }
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $jornals = Jornal::where('titulo', '%' . $searchTerm . '%')->paginate(9);

        return view('pages.home.pesquisa', compact('jornals'));
    }


    public function jornal_index()
    {
        return view('pages.home.jornal.index');
    }

    public function jornal_detalhe($link)
    {
        $jornal = Jornal::where('link', $link)->first();
        return view('pages.home.jornal.detalhe', compact('jornal'));
    }

    public function jornal_pagar()
    {
        $jornals = Jornal::paginate(12);
        return view('pages.home.jornal.pagar', compact('jornals'));
    }

    public function comprarJornal(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'Usuário não autenticado.']);
        }

        $jornal = Jornal::find($request->jornal_id);

        if (!$jornal) {
            return response()->json(['status' => 'error', 'message' => 'Jornal não encontrado.']);
        }

        if ($jornal->preco <= 0) {
            return response()->json(['status' => 'error', 'message' => 'Preço do jornal inválido.']);
        }

        if (Auth::user()->voucher->saldo < $jornal->preco) {
            return response()->json(['status' => 'error', 'message' => 'Saldo insuficiente para realizar a compra.']);
        }

        $voucher = Auth::user()->voucher;
        $preco = $jornal->preco;
        $voucher->saldo = $voucher->saldo - $preco;
        if ($voucher->save()) {
            Pagamento::create([
                'user_id' => Auth::user()->id,
                'jornal_id' => $jornal->id,
                'valor' => $jornal->preco
            ]);
        }
        return response()->json(['status' => 'success', 'message' => 'Compra realizada com sucesso.']);
    }



    public function categoria_index($link)
    {
        $categoria = Categoria::where('link', $link)->first();
        $jornais = Jornal::where('categoria_id', $categoria->id)->paginate(12);

        return view('pages.home.categoria', compact('categoria', 'jornais'));
    }


    public function categorias_todas()
    {
        $jornais = Jornal::paginate(12);

        return view('pages.home.categorias', compact('jornais'));
    }
}
