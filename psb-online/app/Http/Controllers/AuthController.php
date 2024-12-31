<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.login', [
            "title" =>  "Login"
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            Alert::info('Gagal Login', "Username atau password salah !");
            return redirect()->back()->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if (Auth::user()->role === 'admin') {
                return redirect(route('dashboard-admin'));
            } else {
                return redirect(route('dashboard'));
            }
        }

        Alert::info('Login failed', "Wrong email or password!");
        return redirect()->back();
    }

    public function logout()
    {

        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
