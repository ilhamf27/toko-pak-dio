<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function checkin()
    {
        return view('login');
    }

    public function list_user()
    {
        return view('manajemen-user');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();

            if(Auth::user()->is_admin){
                return redirect('/dashboard')->with('success', 'Selamat Datang Kembali '. Auth::user()->name.'!');
            }

            return redirect('/home')->with('success', 'Selamat Datang Kembali di Toko Pak Dio!');
        }

        throw ValidationException::withMessages([
            'password' => 'Sepertinya email atau password yang anda masukkan salah!'
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Terima kasih telah berkunjung, Silahkan datang kembali!');
    }
}
