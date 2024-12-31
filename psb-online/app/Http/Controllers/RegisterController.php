<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ], [
            'email.unique' => 'Email telah digunakan.'
        ]);

        if ($validator->fails()) {
            Alert::info('Warning', 'Validation Error');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($request->password),
                'role' => 'user',
            ]);

            Alert::success('Berhasil', 'Berhasil Membuat Akun');
            return redirect(route('login'));
        } catch (\Throwable $th) {
            Alert::error('Error', 'Registrasi Gagal');
            return redirect()->back();
        }
    }
}
