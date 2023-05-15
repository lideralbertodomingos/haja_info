<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(12);
        return view('pages.admin.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('admin.categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function show($link)
    {
        $categoria = Categoria::where('link',$link)->first();
        return view('pages.admin.categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function edit($link)
    {
        $categoria = Categoria::where('link',$link)->first();
        return view('pages.admin.categoria.edit', compact('categoria'));
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
        $categoria = Categoria::where('link',$link)->first()->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy($link)
    {
        $categoria = Categoria::where('link',$link)->first();
        $categoria->delete();
        return redirect()->route('admin.categoria.index');
    }
}
