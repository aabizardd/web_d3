<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Folder;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
