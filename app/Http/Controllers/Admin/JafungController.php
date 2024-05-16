<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JafungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function regulasi()
    {

        $regulasi = Regulasi::all();

        $data = [
            'regulasi' => $regulasi
        ];
        

        return view('Admin.Jafung.list_regulasi', $data);
    }

    public function add_regulasi(Request $request){

         // Validasi data yang dikirimkan melalui form
         $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,gif|max:2048', // sesuaikan dengan kebutuhan validasi
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pdf' => 'required|mimes:pdf,xls,xlsx|max:2048', // sesuaikan dengan kebutuhan validasi
        ]);

        // Proses menyimpan file gambar
        $gambarPath = $request->file('gambar')->store('public/foto_regulasi');
      
        // Proses menyimpan file PDF
        $pdfPath = $request->file('pdf')->store('public/pdf_regulasi');


        // Simpan data ke database
        Regulasi::create([
            'gambar' => $gambarPath,
            'judul' => $validatedData['judul'],
            'tanggal' => $validatedData['tanggal'],
            'pdf' => $pdfPath,
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.regulasi')->with('success', 'Data file regulasi berhasil disimpan');
    }

    public function hapus_regulasi($id){
         // Temukan berita berdasarkan ID
         $regulasi = Regulasi::findOrFail($id);

         // Hapus foto dari penyimpanan
         Storage::delete($regulasi->gambar);
         Storage::delete($regulasi->pdf);
 
         // Hapus berita dari database
         $regulasi->delete();
 
         // Redirect ke halaman lain dengan pesan sukses
         return redirect()->route('admin.regulasi')->with('success', 'Regulasi berhasil dihapus');
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