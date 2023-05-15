<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Permissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissaos = Permissao::paginate(9);
        return view('pages.admin.permissao.index',compact('permissaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.permissao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permissao::create($request->all());
        return redirect()->route('admin.permissao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function show($link)
    {
        $permissao = Permissao::where('link',$link)->first();
        return view('pages.admin.permissao.show',compact('permissao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function edit($link)
    {
        $permissao = Permissao::where('link',$link)->first();
        return view('pages.admin.permissao.edit',compact('permissao'));
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
        Permissao::where('link',$link)->first()->update($request->all());
        return redirect()->route('admin.permissao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy($link)
    {
        $permissao = Permissao::where('link',$link)->first();
        $permissao->delete();
        return redirect()->route('admin.permissao.index');
    }
}
