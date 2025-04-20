<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Set timezone ke Asia/Jakarta
        // - Buat variabel nama, jam, waktu
        // - Tentukan $salam berdasarkan jam (pagi, siang, sore, malam)
        // - Panggil fungsi getTanggal()
        // - Kirim data ke view 'dashboard' 
        date_default_timezone_set('Asia/Jakarta');

        $nama = 'Asep';
        $jam = date('H.i');
        $waktu = date('H:i:s');
        $tanggal = $this->getTanggal();

        
        $jamFloat = floatval($jam);

        if ($jamFloat >= 5.00 && $jamFloat <= 11.59) {
            $salam = 'Selamat Pagi';
        } elseif ($jamFloat >= 12.00 && $jamFloat <= 14.59) {
            $salam = 'Selamat Siang';
        } elseif ($jamFloat >= 15.00 && $jamFloat <= 17.59) {
            $salam = 'Selamat Sore';
        } else {
            $salam = 'Selamat Malam';
        }

        // Kirim data ke view 'dashboard'
        return view('dashboard', compact('nama', 'waktu', 'tanggal', 'salam'));
    }
    

    private function getTanggal()
    {
        // ==================3==================
        // - Kembalikan tanggal sekarang dalam format dd-mm-yyyy
        return date('d-m-Y');
    }
}
