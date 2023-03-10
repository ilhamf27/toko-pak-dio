<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function checkin()
    {
        return view('login');
    }

    public function list_user()
    {
        return view('manajemen-user',[
            'users' => User::latest()->filter(request(['search']))->paginate(15)
        ]);
    }

    public function top_up()
    {
        $attributes = request()->validate([
            'item_id' => 'nullable',
            'stock' => 'required|integer',
        ]);

        $old_item = User::where('id', $attributes)->get();

        User::where('id', $attributes['item_id'])->update([
            'saldo' => $old_item[0]->saldo + $attributes['stock'],
        ]);

        return back()->with('success', 'Berhasil Menambahkan Stock Item');
    }

    public function new_user()
    {

        $attributes = request()->validate([
            'user_id' => 'nullable',
            'user_name' => ['required','min:3'],
            'email' => ['required','email',Rule::unique('users','email')],
            'saldo' => 'nullable|integer',
            'pass_user' => 'nullable',
            'is_admin' => 'nullable'
        ]);

        if ($attributes['user_id'] != "null") {

            if($attributes['pass_user'] != null){
                User::where('id', $attributes['user_id'])->update([
                    'name' => $attributes['user_name'],
                    'email' => $attributes['email'],
                    'saldo' => $attributes['saldo'],
                    'is_admin' => count($attributes) > 5 ? true : false,
                    'password' => Hash::make($attributes['pass_user'])
                ]);
            }else{
                User::where('id', $attributes['user_id'])->update([
                    'name' => $attributes['user_name'],
                    'email' => $attributes['email'],
                    'saldo' => $attributes['saldo'],
                    'is_admin' => count($attributes) > 5 ? true : false
                ]);
            }

            return back()->with('success', 'Data User Berhasil Diedit!');
        }

        $username = str_replace(' ', '', $attributes['user_name']);

        $existUsername = User::select('username')->where('username', '=', $username)->get();

        if(count($existUsername) > 0){
            $username = $username . "1";
        }

        User::create([
            'username' => $username,
            'name' => $attributes['user_name'],
            'email' => $attributes['email'],
            'saldo' => $attributes['saldo'],
            'password' => $attributes['pass_user'] == null ? Hash::make("password") : Hash::make($attributes['pass_user']),
            'is_admin' => count($attributes) > 5 ? true : false
        ]);

        return back()->with('success', 'User Baru Berhasil Ditambahkan!');
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
