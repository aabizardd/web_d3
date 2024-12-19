<?php

namespace App\Http\Controllers;

use App\Models\AnalisKebijakan;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Pegawai;
use App\Models\ProfilDeputi;
use App\Models\Pustaka;
use App\Models\Regulasi;
use App\Models\Renstra;
use App\Models\StrukturOrganisasi;
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

        $renstra = Renstra::all();

        $data = [
            'renstra' => $renstra
        ];

        return view('FE.renstra.main', $data);
    }

    public function struktur_organisasi()
    {

        if (isset($_GET['atasan'])) {

            // $this->detail_atasan($_GET['atasan']);
            return redirect('struktur_organisasi/detail/' . $_GET['atasan']);
            // dd();
        }

        $asdep = Pegawai::where('jabatan', 'like', 'Asisten Deputi' . '%')->orderBy('id_divisi', 'ASC')->get();
        $deputi = Pegawai::where('nama_pegawai', 'Elen Setiadi')->first();
        $sesdep = Pegawai::where('nama_pegawai', 'Desi Zulfiani')->first();

        $data = [
            'asdep' => $asdep,
            'deputi' => $deputi,
            'sesdep' => $sesdep,
        ];

        return view('FE.struktur_organisasi.main', $data);
    }

    public function detail_atasan($atasan)
    {

        // dd($atasan);

        if ($atasan == 'deputi') {
            $bagian = Pegawai::where('nama_pegawai', 'Elen Setiadi')->first();
        } elseif ($atasan == 'sesdep') {
            $bagian = Pegawai::where('nama_pegawai', 'Desi Zulfiani')->first();

            $data['pegawainya'] = Pegawai::where('id_divisi', 98)->whereNot('jabatan', 'like', 'Sekretaris Deputi' . '%')->get();
        } else {

            // dd(substr($atasan, 5, 6));

            $asdep = (int) substr($atasan, 5, 6);

            $bagian = Pegawai::where('id_divisi', $asdep)->where('jabatan', 'like', 'Asisten Deputi' . '%')->first();

            $data['pegawainya'] = Pegawai::where('id_divisi', operator: $asdep)->whereNot('jabatan', 'like', 'Asisten Deputi' . '%')->get();
        }





        $data['bagian'] = $bagian;

        return view('FE.struktur_organisasi.detail_bos', $data);
    }

    public function profil_deputi()
    {



        $berita = Berita::limit(3)->get();


        $data = [
            'profil' => ProfilDeputi::find(1),
            'berita' => $berita
        ];

        return view('FE.profil_deputi.main', $data);
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


    public function add_lihat($id)
    {

        $berita = Berita::find($id);

        // $tambah = $berita->dilihat + 1;

        $data = [
            'dilihat' => $berita->dilihat + 1
        ];

        $berita->update($data);
    }
    public function analisis_kebijakan()
    {

        $source = AnalisKebijakan::paginate(3);

        $data = [
            'source' => $source
        ];


        return view('FE.analis_kebijakan.main', $data);
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

        $pustaka = Pustaka::paginate(3);

        $data = [
            'pustaka' => $pustaka
        ];

        return view('FE.pustaka.main', $data);
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
