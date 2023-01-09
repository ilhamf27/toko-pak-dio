<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function checkin()
    {
        return view('login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();

            return redirect('/home')->with('success', 'Selamat Datang Kembali di Toko Pak Dio!');
        }

        throw ValidationException::withMessages([
            'password' => 'Sepertinya email atau password yang anda masukkan salah!'
        ]);
    }

    public function destroy()
    {
        auth()->logout();
        
        return redirect('/')->with('success', 'Selamat Tinggal!');
    }
}
