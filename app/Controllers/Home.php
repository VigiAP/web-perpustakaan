<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Home extends BaseController
{
    public function index()
    {
        $bukuModel = new BukuModel();
        
        // Ambil data buku yang baru ditambahkan
        $newBooks = $bukuModel->orderBy('created_at', 'DESC')->findAll(10); // Misalnya ambil 10 buku terbaru
        
        // Kirim data ke view
        return view('home/index', ['newBooks' => $newBooks]);
    }
}
