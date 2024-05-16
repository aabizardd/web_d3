<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'all_berita' => Berita::all()
        ];

        if(isset($_GET['id'])){
            $data['bt'] = Berita::find($_GET['id']);
        }

        return view('Admin.Berita.content', $data);
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
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimum 2MB
            'isi' => 'required|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proses penyimpanan file foto
        $fotoPath = $request->file('foto')->store('public/foto'); // Simpan di dalam direktori storage

        // Buat entri baru di database
        $post = new Berita();
        $post->judul = $request->judul;
        $post->foto = $fotoPath;
        $post->isi = $request->isi;
        $post->tanggal = $request->tanggal;
        $post->id_user = auth()->user()->id;
        $post->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.berita')->with('success', 'Post berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimum 2MB
            'isi' => 'required|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Temukan berita berdasarkan ID
        $post = Berita::findOrFail($id);

        // Update judul dan isi berita
        $post->judul = $request->judul;
        $post->isi = $request->isi;
        $post->tanggal = $request->tanggal;

        // Update foto jika diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::delete($post->foto);

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('public/foto');
            $post->foto = $fotoPath;
        }

        // Simpan perubahan
        $post->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // Temukan berita berdasarkan ID
         $post = Berita::findOrFail($id);

         // Hapus foto dari penyimpanan
         Storage::delete($post->foto);
 
         // Hapus berita dari database
         $post->delete();
 
         // Redirect ke halaman lain dengan pesan sukses
         return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus');
    }
}