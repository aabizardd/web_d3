<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'foto_pegawai' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'nama_pegawai' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tentang' => 'nullable|string',
        ]);

        // Proses upload file foto
        $fotoPath = null;
        if ($request->hasFile('foto_pegawai')) {
            $fotoPath = $request->file('foto_pegawai')->store('pegawai_foto', 'public');
        }

        // Simpan data ke database
        $pegawai = new Pegawai();
        $pegawai->foto_pegawai = $fotoPath;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->golongan = $request->golongan;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->tentang = $request->tentang;
        $pegawai->id_divisi = $request->id_divisi;
        $pegawai->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.struktur_organisasi', [
            'page' => 'list_pegawai',
            'id' => $request->id_divisi
        ])->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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
    public function update(Request $request, $id)
    {
        // dd('ok');
        // Validasi input
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tentang' => 'nullable|string',
            'foto_pegawai' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);


        // Cari pegawai berdasarkan ID
        $pegawai = Pegawai::find($id);

        // dd($pegawai);

        // Update data pegawai
        $pegawai->nama_pegawai = $request->input('nama_pegawai');
        $pegawai->golongan = $request->input('golongan');
        $pegawai->jabatan = $request->input('jabatan');
        $pegawai->tentang = $request->input('tentang');

        // dd($pegawai->tentang);

        // Jika ada file foto diupload
        if ($request->hasFile('foto_pegawai')) {
            // Hapus foto lama jika ada
            if ($pegawai->foto_pegawai && Storage::exists('public/' . $pegawai->foto_pegawai)) {
                Storage::delete('public/' . $pegawai->foto_pegawai);
            }

            // Simpan foto baru
            $path = $request->file('foto_pegawai')->store('pegawai', 'public');
            $pegawai->foto_pegawai = $path;
        }

        // Simpan perubahan
        $pegawai->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.struktur_organisasi', [
            'page' => 'list_pegawai',
            'id' => 3
        ])->with('success', 'Data pegawai berhasil dihapus!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $asdep)
    {

        // Cari data pegawai berdasarkan ID
        $pegawai = Pegawai::findOrFail($id);

        // Hapus file foto jika ada
        if ($pegawai->foto_pegawai && Storage::exists('public/' . $pegawai->foto_pegawai)) {
            Storage::delete('public/' . $pegawai->foto_pegawai);
        }

        // Hapus data dari database
        $pegawai->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.struktur_organisasi', [
            'page' => 'list_pegawai',
            'id' => $asdep
        ])->with('success', 'Data pegawai berhasil dihapus!');
    }
}
