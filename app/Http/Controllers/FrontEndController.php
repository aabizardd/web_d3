<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Regulasi;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $berita = Berita::limit(3)->get();

        $data = [
            'berita' => $berita
        ];

        return view('FE.beranda.main', $data);
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
        $berita = Berita::paginate(6);

        $data = [
            'berita' => $berita
        ];

        return view('FE.berita.main', $data);
    }

    public function detail_berita($id)
    {

        $data = [
            'berita' => Berita::find($id),
            'berita_terkait' => Berita::where('id', '!=', $id)->limit(3)->get()
        ];

        $this->add_lihat($id);

        return view('FE.berita.detail-berita', $data);
    }


    public function add_lihat($id){
        
        $berita = Berita::find($id);

        // $tambah = $berita->dilihat + 1;

        $data = [
            'dilihat' => $berita->dilihat + 1
        ];

        $berita->update($data);
        
    }
    public function analisis_kebijakan()
    {

        return view('FE.analis_kebijakan.main');
    }

    public function regulasi()
    {

        $regulasi = Regulasi::paginate(3);

        $data = [
            'regulasi' => $regulasi
        ];

        return view('FE.regulasi.main', $data);
    }

    public function artikel()
    {
        $artikel = Artikel::paginate(6);

        $data = [
            'artikel' => $artikel
        ];

        return view('FE.artikel.main', $data);
    }

    public function detail_artikel($id)
    {

        $data = [
            'berita' => Artikel::find($id),
            'berita_terkait' => Artikel::where('id', '!=', $id)->limit(3)->get()
        ];

        // $this->add_lihat($id);

        return view('FE.berita.detail-artikel', $data);
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