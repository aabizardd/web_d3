<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pegawai;
use App\Models\ProfilDeputi;
use App\Models\Renstra;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


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

    public function profil_deputi()
    {

        $profil = ProfilDeputi::find(1);

        $data = [
            'profil' => $profil
        ];

        return view('Admin.ProfilDeputi.profil_deputi', $data);
    }

    public function update_profil_deputi(Request $request)
    {

        // Validasi input
        $validator = Validator::make($request->all(), [
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
        $upd_data = ProfilDeputi::findOrFail(1);

        // Update foto dan isi berita
        $upd_data->isi = $request->isi;

        // Update foto jika diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            // Storage::delete($upd_data->foto);
            if (!is_null($upd_data->foto) && is_string($upd_data->foto)) {
                Storage::delete($upd_data->foto);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('public/foto_deputi');
            $upd_data->foto = $fotoPath;
        }

        // Simpan perubahan
        $upd_data->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->back()->with('success', 'Profil deputi berhasil diperbarui');
    }

    public function struktur_organisasi()
    {

        $divisi = Divisi::all();

        $data = [
            'divisi' => $divisi
        ];

        if (isset($_GET['id'])) {
            $data['sok'] = Divisi::find($_GET['id']);
        }

        if (isset($_GET['page']) && $_GET['page'] == "list_pegawai") {
            $data['list_pegawai'] = Pegawai::where('id_divisi', $_GET['id'])->get();
        }

        if (isset($_GET['page']) && $_GET['page'] == "update_pegawai") {
            $data['pegawai'] = Pegawai::find($_GET['id']);
        }

        return view('Admin.StrukturOrganisasi.data_struktur', $data);
    }

    public function update_struktur(Request $request, $id)
    {

        // Validasi input
        $validator = Validator::make($request->all(), [
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048', // Maksimum 2MB

        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Temukan berita berdasarkan ID
        $upd_data = StrukturOrganisasi::findOrFail($id);



        // Update foto jika diunggah
        if ($request->hasFile('gambar')) {
            // Hapus foto lama
            // Storage::delete($upd_data->foto);
            if (!is_null($upd_data->gambar) && is_string($upd_data->gambar)) {
                Storage::delete($upd_data->gambar);
            }

            // Simpan foto baru
            $fotoPath = $request->file('gambar')->store('public/foto_struktur_organisasi');
            $upd_data->gambar = $fotoPath;
        }

        // Simpan perubahan
        $upd_data->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.struktur_organisasi')->with('success', 'Struktur Organisasi berhasil diperbarui');
    }

    public function tambah_divisi(Request $request)
    {

        // Validasi data yang dikirimkan melalui form
        $validatedData = $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'kepala_divisi' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Divisi::create([
            'nama_divisi' => $validatedData['nama_divisi'],
            'kepala_divisi' => $validatedData['kepala_divisi'],
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.struktur_organisasi')->with('success', 'Data Divisi berhasil disimpan');
    }

    public function delete_divisi($id)
    {

        $divisi = Divisi::find($id);

        $divisi->delete();

        return redirect()->route('admin.struktur_organisasi')->with('success', 'Data Divisi berhasil dihapus');
    }

    public function ubah_divisi(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'kepala_divisi' => 'required|string|max:255',
        ]);

        // Cari data divisi berdasarkan ID
        $divisi = Divisi::findOrFail($id);

        // Update data divisi
        $divisi->update([
            'nama_divisi' => $validatedData['nama_divisi'],
            'kepala_divisi' => $validatedData['kepala_divisi'],
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.struktur_organisasi')->with('success', 'Data Divisi berhasil diperbarui');
    }
}
