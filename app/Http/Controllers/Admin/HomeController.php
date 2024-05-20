<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Rapat;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd(auth()->user()->role);

        if (auth()->user()->role == 1) {
            $data = [
                'ct_pengguna' => User::count(),
                'ct_berita' => Berita::count(),
                'ct_artikel' => Artikel::count(),
                'ct_pic' => User::where('role', 2)->count(),
            ];
        } else {
            $data = [
                'ct_rapat' => Rapat::join('users', 'users.id', '=', 'rapat.id_user')
                    ->where('users.asdep', auth()->user()->asdep)
                    ->count(),
                'ct_berita' => Berita::join('users', 'users.id', '=', 'berita.id_user')
                    ->where('users.asdep', auth()->user()->asdep)
                    ->count(),
                'ct_artikel' => Artikel::count(),
                'ct_pic' => User::where('asdep', auth()->user()->asdep)->count(),
            ];
        }

        return view('Admin.Home.content', $data);
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
