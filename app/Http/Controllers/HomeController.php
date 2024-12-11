<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {


        $produks = Produk::get();
        return view('app.home', compact('produks'));

        // $produks->dd();


    }
}
