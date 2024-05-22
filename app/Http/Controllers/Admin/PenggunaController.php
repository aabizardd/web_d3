<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pengguna' => User::all()
        ];

        if (isset($_GET['id'])) {
            $data['pg'] = User::find($_GET['id']);
        }

        return view('Admin.Pengguna.content', $data);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|integer',
            'asdep' => 'integer',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Buat pengguna baru
        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->asdep = $request->asdep;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna baru berhasil ditambahkan');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|integer',
            'asdep' => 'integer',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Update data pengguna
        $user->name = $request->name;
        $user->role = $request->role;
        $user->asdep = $request->asdep;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->filled('password')) {
            // dd('password tidak diisi');
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.pengguna')->with('success', 'Data pengguna berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.pengguna')->with('success', 'Data pengguna berhasil dihapus');
    }
}
