<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "Ini adalah halaman mahasiswa";
    }

    public function insertSql()
    {
        $query = DB::insert("INSERT INTO students (
            nim,
            nama_lengkap,
            tempat_lahir,
            tgl_lahir,
            email,
            prodi,
            alamat,
            created_at,
            updated_at
        ) VALUES (
            '2401093006',
            'Haifa Hafitriyanti',
            'Padang',
            '2005-08-04',
            'Haifa@gmail.com',
            'MI',
            'Jl. Perintis Kemerdekaan no. 100',
            NOW(),
            NOW())");
    }
}