<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Regra;
use Illuminate\Http\Request;

class RegraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regras = Regra::paginate(9);
        return view('pages.admin.regra.index',compact('regras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.regra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Regra::create($request->all());
        return redirect()->route('admin.regra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function show($link)
    {
        $regra = Regra::where('link',$link)->first();
        return view('pages.admin.regra.edit',compact('regra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function edit($link)
    {
        $regra = Regra::where('link',$link)->first();
        return view('pages.admin.regra.edit',compact('regra'));
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
        $regra = Regra::where('link',$link)->first()->update($request->all());
        return redirect()->route('admin.regra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy($link)
    {
        $regra = Regra::where('link',$link)->first();
        $regra->delete();
        return redirect()->route('admin.regra.index');
    }
}
