<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Agama;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::where('user_id', Auth::id())->get();
        return view('pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kabupatens = Kabupaten::all();
        $provinsis = Provinsi::all();
        $agamas = Agama::all();
        return view('pendaftaran.create', compact('kabupatens', 'provinsis', 'agamas'), [
            'title' => 'Form Pendaftaran'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data pendaftaran
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'Alamat_KTP' => 'required|string|max:255',
            'Alamat_lengkap' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'provinsi_id' => 'required|exists:provinsis,id',
            'nomor_telpon' => 'required|integer',
            'nomor_hp' => 'required|integer',
            'email' => 'required|email|unique:pendaftarans',
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'optional_tempat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'status_menikah' => 'required|in:Belum menikah,Menikah,Lain-lain(janda/duda)',
            'agama_id' => 'required|exists:agamas,id',
        ]);

        // Tambahkan user_id ke data yang akan disimpan
        $validatedData['user_id'] = Auth::id(); // Mendapatkan ID user yang sedang login

        // Simpan data pendaftaran
        Pendaftaran::create($validatedData);
        Alert::success('Berhasil', 'Berhasil Membuat Formulir Pendaftaran');
        return redirect()->route('status-pendaftaran');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil data pendaftaran berdasarkan ID dan user_id pengguna yang sedang login
        $pendaftaran = Pendaftaran::where('id', $id)->where('user_id', Auth::id())->first();

        // Jika data tidak ditemukan atau bukan milik user, redirect dengan pesan
        if (!$pendaftaran) {
            return redirect()->route('status-pendaftaran')->with('error', 'Data pendaftaran tidak ditemukan atau tidak diizinkan.');
        }

        return view('pendaftaran.show', compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data pendaftaran berdasarkan ID dan user_id pengguna yang sedang login
        $pendaftaran = Pendaftaran::where('id', $id)->where('user_id', Auth::id())->first();

        // Jika data tidak ditemukan atau bukan milik user, redirect dengan pesan
        if (!$pendaftaran) {
            return redirect()->route('status-pendaftaran')->with('error', 'Data pendaftaran tidak ditemukan atau tidak diizinkan.');
        }

        $kabupatens = Kabupaten::all();
        $provinsis = Provinsi::all();
        $agamas = Agama::all();

        return view('pendaftaran.edit', compact('pendaftaran', 'kabupatens', 'provinsis', 'agamas'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data pendaftaran berdasarkan ID dan user_id pengguna yang sedang login
        $pendaftaran = Pendaftaran::where('id', $id)->where('user_id', Auth::id())->first();

        // Jika data tidak ditemukan atau bukan milik user, redirect dengan pesan
        if (!$pendaftaran) {
            return redirect()->route('status-pendaftaran')->with('error', 'Data pendaftaran tidak ditemukan atau tidak diizinkan.');
        }

        // Validasi data pendaftaran
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'Alamat_KTP' => 'required|string|max:255',
            'Alamat_lengkap' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'provinsi_id' => 'required|exists:provinsis,id',
            'nomor_telpon' => 'required|integer',
            'nomor_hp' => 'required|integer',
            'email' => 'required|email|unique:pendaftarans,email,' . $pendaftaran->id,
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'optional_tempat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'status_menikah' => 'required|in:Belum menikah,Menikah,Lain-lain(janda/duda)',
            'agama_id' => 'required|exists:agamas,id',
        ]);

        // Perbarui data pendaftaran
        $pendaftaran->update($validatedData);
        Alert::success('Berhasil', 'Pendaftaran berhasil diperbarui.');
        return redirect()->route('status-pendaftaran');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Ambil data pendaftaran berdasarkan ID dan user_id pengguna yang sedang login
        $pendaftaran = Pendaftaran::where('id', $id)->where('user_id', Auth::id())->first();

        // Jika data tidak ditemukan atau bukan milik user, redirect dengan pesan
        if (!$pendaftaran) {
            return redirect()->route('status-pendaftaran')->with('error', 'Data pendaftaran tidak ditemukan atau tidak diizinkan.');
        }

        // Hapus data pendaftaran
        $pendaftaran->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data Pendaftaran');
        return redirect()->route('status-pendaftaran');
    }

    public function generatePDF($id)
    {
        // Ambil data pendaftaran berdasarkan ID dan user_id pengguna yang sedang login
        $pendaftaran = Pendaftaran::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        // Jika data tidak ditemukan atau bukan milik user, redirect dengan pesan
        if (!$pendaftaran) {
            return redirect()->route('status-pendaftaran')->with('error', 'Data pendaftaran tidak ditemukan atau tidak diizinkan.');
        }

        // Generate PDF jika data ditemukan
        $pdf = PDF::loadView('pendaftaran.pdf', compact('pendaftaran'));

        return $pdf->download('detail_pendaftaran.pdf');
    }
}
