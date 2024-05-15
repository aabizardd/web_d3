<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('Admin.Auth.login');
    }

    public function check_login(Request $request)
    {

        // Validasi input form
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

         // Attempt to login
         $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
             
             return redirect()->route('admin.dashboard');
         }
 
         // Jika login gagal
         return redirect()->back()
             ->withErrors(['email' => 'These credentials do not match our records.'])
             ->withInput();

        // return view('Admin.Auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}