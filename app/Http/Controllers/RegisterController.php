<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {

        return view('app.register');

    }


    protected function createCustomer(array $data)
    {
        $id = Uuid::uuid4()->getHex();
        $nama = ucwords(strtolower($data['nama']));
        $email = strtolower($data['email']);

        return Customer::create([

            'id' => $id,
            'name' => $nama,
            'role' => $data['alamat'],
            'notelepon' => $data['notelepon'],

            'email' => $email,
            'password' => Hash::make($data['password']),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }


    // Register Logic
    /**
     * Method untuk mendaftarkan user baru
     */
    public function registerHandle(Request $request)
    {

        dd($request->all());
        // $this->validator($request->all())->validate();

        //  method ini akan memvalidasi data yang dikirimkan
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:mahasiswas', 'unique:stafs', 'unique:pegawais'],
            'password' => ['required', 'string', 'min:3'],
            'role' => ['required', 'string', 'max:255'],
            'nomorInduk' => ['required', 'string', 'max:255'],
            'notelepon' => ['required', 'string', 'max:255'],
        ]);



        event(new Registered($user = $this->createCustomer($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return redirect()->route('home')->with('success', 'Berhasil Mendaftar');


    }

    /**
     * Method untuk mengambil guard yang digunakan
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Method untuk mengalihkan user setelah login
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

        //  method ini akan mengalihkan user setelah login
        // return null;

    }


}
