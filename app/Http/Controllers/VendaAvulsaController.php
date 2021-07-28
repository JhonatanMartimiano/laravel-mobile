<?php

namespace App\Http\Controllers;

use App\VendaAvulsa;
use Illuminate\Http\Request;

class VendaAvulsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.venda_avulsa.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.venda_avulsa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\VendaAvulsa $vendaAvulsa
     * @return \Illuminate\Http\Response
     */
    public function show(VendaAvulsa $vendaAvulsa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\VendaAvulsa $vendaAvulsa
     * @return \Illuminate\Http\Response
     */
    public function edit(VendaAvulsa $vendaAvulsa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\VendaAvulsa $vendaAvulsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VendaAvulsa $vendaAvulsa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\VendaAvulsa $vendaAvulsa
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendaAvulsa $vendaAvulsa)
    {
        //
    }


    public function getImportar()
    {
        return view('admin.pages.venda_avulsa.importar');
    }

    public function doPesquisar()
    {
        return view('admin.pages.venda_avulsa.show');
    }

    public function doImportar()
    {

    }

}
