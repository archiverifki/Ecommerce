<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login()
    {

        return view('app.login');

    }

    public function loginHandle(Request $request)
    {


        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        // session regenerasi token untuk menghindari session fixation 
        // (session fixation adalah serangan yang memaksa pengguna untuk menggunakan session tertentu)
        $request->session()->regenerateToken();
        // menghapus session yang sudah ada
        $request->session()->invalidate();

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, loginlan user


            return redirect()->intended(route('home'))->with('success', 'Login Berhasil');
        }


    }



}
