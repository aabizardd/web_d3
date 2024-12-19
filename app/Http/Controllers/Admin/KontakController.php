<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kontak'] = Kontak::all();

        if (isset($_GET['page'])) {
            // $data['pg'] = User::find($_GET['id']);
            if ($_GET['page'] == 'ubah_kontak') {

                $data['d_kontak'] = Kontak::find($_GET['id']);
            }
        }

        return view('Admin.Kontak.content', $data);
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
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255', // typo pada "jabtan" di form harus konsisten
            'asal_kantor' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'divisi' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15|regex:/^[0-9]+$/',
        ]);


        // Simpan data ke database
        Kontak::create([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'), // sesuai nama field di form
            'asal_kantor' => $request->input('asal_kantor'),
            'email' => $request->input('email'),
            'divisi' => $request->input('divisi'),
            'no_hp' => $request->input('no_hp'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kontak')->with('success', 'Kontak berhasil ditambahkan.');
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
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255', // Sesuaikan dengan typo di form jika tidak diubah
            'asal_kantor' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'divisi' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15|regex:/^[0-9]+$/',
        ]);


        // Cari kontak berdasarkan ID
        $kontak = Kontak::findOrFail($id);

        // Update data kontak
        $kontak->update([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'), // Sesuaikan dengan nama field di form
            'asal_kantor' => $request->input('asal_kantor'),
            'email' => $request->input('email'),
            'divisi' => $request->input('divisi'),
            'no_hp' => $request->input('no_hp'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kontak')->with('success', 'Kontak berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari kontak berdasarkan ID
            $kontak = Kontak::findOrFail($id);

            // Hapus kontak
            $kontak->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.kontak')->with('success', 'Kontak berhasil dihapus.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika ada kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
