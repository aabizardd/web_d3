<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('FE.beranda.main');
    }

    public function tugas()
    {

        return view('FE.tugas.main');
    }

    public function renstra()
    {

        return view('FE.renstra.main');
    }

    public function struktur_organisasi()
    {

        return view('FE.struktur_organisasi.main');
    }

    public function profil_deputi()
    {

        return view('FE.profil_deputi.main');
    }

    public function berita()
    {

        return view('FE.berita.main');
    }

    public function analisis_kebijakan()
    {

        return view('FE.analis_kebijakan.main');
    }

    public function regulasi()
    {

        return view('FE.regulasi.main');
    }

    public function artikel()
    {

        return view('FE.artikel.main');
    }

    public function pustaka()
    {

        return view('FE.pustaka.main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
