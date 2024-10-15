<?php

namespace App\Http\Controllers;

use App\Models\BahanRapat;
use App\Models\Berita;
use App\Models\FileRapat;
use App\Models\Folder;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BahanRapatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'folder' => Folder::all(),
        ];

        if (isset($_GET['asdep'])) {
            $data['tahun'] = Rapat::where('id_folder', $_GET['asdep'])
                ->selectRaw('YEAR(tanggal_rapat) as tahun')
                ->groupBy('tahun')
                ->get();
            // dd($data['tahun']);
        }

        if (isset($_GET['tahun'])) {
            $data['bulan'] = Rapat::where('id_folder', $_GET['asdep'])
                ->whereYear('tanggal_rapat', $_GET['tahun'])
                ->selectRaw('MONTH(tanggal_rapat) as bulan')
                ->groupBy('bulan')
                ->get();
        }

        if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
            // dd('iya');
            $data['rapat'] = Rapat::where('id_folder', $_GET['asdep'])
                ->whereYear('tanggal_rapat', $_GET['tahun'])
                ->whereMonth('tanggal_rapat', $_GET['bulan'])
                ->get();

            // dd($data['rapat']);
        }

        return view('Admin.BahanRapat.content', $data);
    }

    public function add_rapat(Request $request)
    {
        // dd(Auth::id());

        $request->validate([
            'nama_rapat' => 'required|string|max:255',
            'tanggal_rapat' => 'required|date',
            'id_folder' => 'required|integer'
        ]);

        $rapat = new Rapat();
        $rapat->nama_rapat = $request->nama_rapat;
        $rapat->tanggal_rapat = $request->tanggal_rapat;
        $rapat->id_folder = $request->id_folder;
        $rapat->id_user = Auth::id(); // asumsi ada kolom user_id di tabel rapat

        $rapat->save();

        return redirect()->route('admin.bahan_rapat')->with('success', 'Informasi rapat berhasil ditambahkan.');
    }



    public function destroy($id)
    {
        $rapat = Rapat::find($id);
        if ($rapat->delete()) {
            return redirect()->back()->with('success', 'Rapat berhasil dihapus.');
        }
    }

    public function detail_bahan($id)
    {

        $data = [
            'rapat' => Rapat::find($id),
            'folder' => Folder::all(),
            'file' => FileRapat::where('id_rapat', $id)->get(),
        ];

        // if(isset($_GET['page'])){
        //     $data['']
        // }

        return view('Admin.BahanRapat.detail_bahan', $data);
    }

    public function update_rapat(Request $request, $id)
    {
        $request->validate([
            'nama_rapat' => 'required|string|max:255',
            'tanggal_rapat' => 'required|date',
            'id_folder' => 'required|integer'
        ]);

        $rapat = Rapat::findOrFail($id);

        $rapat->nama_rapat = $request->nama_rapat;
        $rapat->tanggal_rapat = $request->tanggal_rapat;
        $rapat->id_folder = $request->id_folder;

        $rapat->save();

        return redirect()->back()->with('success', 'Informasi rapat berhasil diperbarui.');
    }

    public function store_bahan(Request $request, $id)
    {

        // dd($id);
        $request->validate([
            'file' => $request->inputType === 'file' ? 'required|file|max:20048' : 'nullable',
            // Jika memilih link, link harus diisi
            'link' => $request->inputType === 'link' ? 'required' : 'nullable',
            'nama_file' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',

        ]);


        $bahanRapat = new FileRapat();
        $bahanRapat->nama_file = $request->nama_file;
        $bahanRapat->keperluan = $request->keperluan;
        $bahanRapat->catatan = $request->catatan;

        $bahanRapat->id_rapat = $request->id_rapat;


        // dd($request->link);
        // Cek apakah inputType adalah file atau link
        if (!is_null($request->file)) {
            // Jika file diunggah, simpan file
            $filePath = $request->file('file')->store('public/file_bahan_asdep_' . $id);
            $bahanRapat->file = $filePath;
        } elseif (!is_null($request->link)) {
            // Jika link dimasukkan, simpan link sebagai file path
            // dd('ok');
            $bahanRapat->link = $request->link;
            // dd($request->link);
        }
        $bahanRapat->save();

        // $filePath = $request->file('file')->store('public/file_bahan_asdep_' . $id);

        // $bahanRapat->file = $filePath;

        return redirect()->route('admin.detail_bahan', $request->id_rapat)->with('success', 'Bahan rapat berhasil ditambahkan.');
    }

    public function hapus_bahan($id)
    {
        // Temukan berita berdasarkan ID
        $bahan = FileRapat::findOrFail($id);

        // Cek apakah file tidak null dan ada dalam penyimpanan
        if ($bahan->file && Storage::exists($bahan->file)) {
            // Hapus file dari penyimpanan
            Storage::delete($bahan->file);
        }

        // Hapus berita dari database
        $bahan->delete();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->back()->with('success', 'File rapat berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $bahan = FileRapat::where('nama_file', 'LIKE', "%$search%")->get();
        return response()->json($bahan);
    }
}

// 2024-05-20 09:00:00