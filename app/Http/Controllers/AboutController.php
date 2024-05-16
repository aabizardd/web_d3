<?php

namespace App\Http\Controllers;

use App\Models\Renstra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{

    public function renstra()
    {

        $renstra = Renstra::all();

        $data = [
            'renstra' => $renstra
        ];

        return view('Admin.Renstra.list_renstra', $data);
    }

    public function add_renstra(Request $request)
    {

        // Validasi data yang dikirimkan melalui form
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,gif|max:2048', // sesuaikan dengan kebutuhan validasi
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pdf' => 'required|mimes:pdf,xls,xlsx|max:20048', // sesuaikan dengan kebutuhan validasi
        ]);

        // Proses menyimpan file gambar
        $gambarPath = $request->file('gambar')->store('public/foto_renstra');

        // Proses menyimpan file PDF
        $pdfPath = $request->file('pdf')->store('public/pdf_renstra');


        // Simpan data ke database
        Renstra::create([
            'gambar' => $gambarPath,
            'judul' => $validatedData['judul'],
            'tanggal' => $validatedData['tanggal'],
            'pdf' => $pdfPath,
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.renstra')->with('success', 'Data Renstra berhasil disimpan');
    }

    public function hapus_renstra($id)
    {
        // Temukan berita berdasarkan ID
        $data = Renstra::findOrFail($id);

        // Hapus foto dari penyimpanan
        Storage::delete($data->gambar);
        Storage::delete($data->pdf);

        // Hapus berita dari database
        $data->delete();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.renstra')->with('success', 'Data Renstra berhasil dihapus');
    }
}
