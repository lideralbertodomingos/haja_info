<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Jornal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JornalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->regra->regra->name == 'admin'){
            $jornais = Jornal::paginate(9);
        }else{
            $jornais = Jornal::where('visibilidade','publica')->paginate(9);
        }
        return view('pages.admin.jornal.index',compact('jornais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('pages.admin.jornal.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'titulo' => 'required',            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'imagem' => 'required|max:2048',
            'categoria' => 'required|exists:categorias,id',
            'preco' => 'required|numeric|min:0',
        ];

        // Define as mensagens de erro personalizadas
        $messages = [
            'titulo.required' => 'O campo Título é obrigatório.',
            'titulo.max' => 'O campo Título não pode ter mais que :max caracteres.',
            'descricao.required' => 'O campo Descrição é obrigatório.',
            'imagem.max' => 'O tamanho máximo do arquivo é de 2 MB.',
            'categoria.required' => 'O campo Categoria é obrigatório.',
            'categoria.exists' => 'A categoria selecionada não existe.',
            'preco.required' => 'O campo Preço é obrigatório.',
            'preco.numeric' => 'O campo Preço deve ser um valor numérico.',
            'preco.min' => 'O campo Preço não pode ser negativo.',
        ];

        // Executa a validação dos campos do formulário
        $validator = Validator::make($request->all(), $rules, $messages);

        // Verifica se a validação falhou
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('imagem')){
            $status = null;
            if($request->regra == 'admin'){
                $status = 'pronto';
            }else{
                $status = 'adicionado';
            }
            $file = $request->file('imagem')->store('jornal/imagem','public');
            $imagem = asset(Storage::url($file));

            $jornal = new Jornal();
            $jornal->create([
                'titulo' => $request->titulo,
                'descricao' => $request->descricao,
                'imagem' => $imagem,
                'user_id' => $request->user,
                'categoria_id' => $request->categoria,
                'preco' => $request->preco,
                'status' => $status,
            ]);
        }
        return redirect()->route('admin.jornal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function show($link)
    {
        $jornal = Jornal::where('link',$link)->first();
        return view('pages.admin.jornal.show',compact('jornal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function edit($link)
    {
        $jornal = Jornal::where('link',$link)->first();
        $categorias = Categoria::all();
        return view('pages.admin.jornal.edit',compact('jornal','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $link)
    {
        $jornal = Jornal::where('link',$link)->first()->update($request->all());
        return redirect()->route('admin.jornal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy($link)
    {
        $jornal = Jornal::where('link',$link)->first();
        $jornal->delete();
        return redirect()->route('admin.jornal.index');
    }
}
