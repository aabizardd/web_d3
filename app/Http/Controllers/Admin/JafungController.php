<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalisKebijakan;
use App\Models\Artikel;
use App\Models\Pustaka;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;

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

    public function add_regulasi(Request $request)
    {

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

    public function hapus_regulasi($id)
    {
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


    public function artikel()
    {

        $artikel = Artikel::all();

        $data = [
            'artikel' => $artikel
        ];


        if (isset($_GET['id'])) {
            $data['atk'] = Artikel::find($_GET['id']);
        }

        return view('Admin.Jafung.list_artikel', $data);
    }

    public function add_artikel(Request $request)
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
        $fotoPath = $request->file('foto')->store('public/foto_artikel'); // Simpan di dalam direktori storage

        // Buat entri baru di database
        $post = new Artikel();
        $post->judul = $request->judul;
        $post->foto = $fotoPath;
        $post->isi = $request->isi;
        $post->tanggal = $request->tanggal;
        $post->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil disimpan');
    }

    public function update_artikel(Request $request, $id)
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
        $post = Artikel::findOrFail($id);

        // Update judul dan isi berita
        $post->judul = $request->judul;
        $post->isi = $request->isi;
        $post->tanggal = $request->tanggal;

        // Update foto jika diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::delete($post->foto);

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('public/foto_artikel');
            $post->foto = $fotoPath;
        }

        // Simpan perubahan
        $post->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diperbarui');
    }

    public function hapus_artikel($id)
    {
        // Temukan berita berdasarkan ID
        $post = Artikel::findOrFail($id);

        // Hapus foto dari penyimpanan
        Storage::delete($post->foto);

        // Hapus berita dari database
        $post->delete();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus');
    }

    public function analis_kebijakan()
    {

        $analis_kebijakan = AnalisKebijakan::all();

        $data = [
            'analis_kebijakan' => $analis_kebijakan
        ];



        return view('Admin.Jafung.list_analis_kebijakan', $data);
    }

    public function add_analis_kebijakan(Request $request)
    {

        // Validasi data yang dikirimkan melalui form
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,gif|max:2048', // sesuaikan dengan kebutuhan validasi
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pdf' => 'required|mimes:pdf,xls,xlsx|max:2048', // sesuaikan dengan kebutuhan validasi
        ]);

        // Proses menyimpan file gambar
        $gambarPath = $request->file('gambar')->store('public/foto_analisis_kebijakan');

        // Proses menyimpan file PDF
        $pdfPath = $request->file('pdf')->store('public/pdf_analisis_kebijakan');


        // Simpan data ke database
        AnalisKebijakan::create([
            'gambar' => $gambarPath,
            'judul' => $validatedData['judul'],
            'tanggal' => $validatedData['tanggal'],
            'pdf' => $pdfPath,
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.analis_kebijakan')->with('success', 'Data Analisis Kebijakan berhasil disimpan');
    }

    public function hapus_analisis_kebijakan($id)
    {
        // Temukan berita berdasarkan ID
        $data = AnalisKebijakan::findOrFail($id);

        // Hapus foto dari penyimpanan
        Storage::delete($data->gambar);
        Storage::delete($data->pdf);

        // Hapus berita dari database
        $data->delete();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.analis_kebijakan')->with('success', 'Analisis Kebijakan berhasil dihapus');
    }

    public function pustaka()
    {

        $pustaka = Pustaka::all();

        $data = [
            'pustaka' => $pustaka
        ];

        return view('Admin.Jafung.list_pustaka', $data);
    }

    public function add_pustaka(Request $request)
    {

        // Validasi data yang dikirimkan melalui form
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,gif|max:2048', // sesuaikan dengan kebutuhan validasi
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pdf' => 'required|mimes:pdf,xls,xlsx|max:2048', // sesuaikan dengan kebutuhan validasi
        ]);

        // Proses menyimpan file gambar
        $gambarPath = $request->file('gambar')->store('public/foto_pustaka');

        // Proses menyimpan file PDF
        $pdfPath = $request->file('pdf')->store('public/pdf_pustaka');


        // Simpan data ke database
        Pustaka::create([
            'gambar' => $gambarPath,
            'judul' => $validatedData['judul'],
            'tanggal' => $validatedData['tanggal'],
            'pdf' => $pdfPath,
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.pustaka')->with('success', 'Data Pustaka berhasil disimpan');
    }

    public function hapus_pustaka($id)
    {
        // Temukan berita berdasarkan ID
        $data = Pustaka::findOrFail($id);

        // Hapus foto dari penyimpanan
        Storage::delete($data->gambar);
        Storage::delete($data->pdf);

        // Hapus berita dari database
        $data->delete();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.pustaka')->with('success', 'Data Pustaka berhasil dihapus');
    }
}