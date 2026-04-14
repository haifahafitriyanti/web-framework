<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function cekObject()
    {
        $mahasiswa = new Student();
        dd($mahasiswa);
    }

    public function insert()
    {
        $mahasiswa = new Student();
        $mahasiswa->nim = '2401093006';
        $mahasiswa->nama_lengkap = 'Haifa';
        $mahasiswa->tempat_lahir = 'Padang';
        $mahasiswa->tgl_lahir = '2005-08-04';
        $mahasiswa->email = 'haifa@gmail.com';
        $mahasiswa->prodi = 'TRPL';
        $mahasiswa->alamat = 'Jl. Perintis Kemerdekaan no. 100';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function massAssigment()
    {
        $mahasiswa = Student::create(
            [
                'nim' => '2401093006',
                'nama_lengkap' => 'Haifa Hafitriyanti',
                'tempat_lahir' => 'Padang',
                'tgl_lahir' => '2005-08-04',
                'email' => 'haifa@gmail.com',
                'prodi' => 'MI',
                'alamat' => 'Padang',
            ]
        );
        dump($mahasiswa);
        $mahasiswa1 = Student::create(
            [
                'nim' => '2401093001',
                'nama_lengkap' => 'Adip Habibullah',
                'tempat_lahir' => 'Pasaman',
                'tgl_lahir' => '2005-08-28',
                'email' => 'riyiknjir@gmail.com',
                'prodi' => 'MI',
                'alamat' => 'Padang',
            ]
        );
        dump($mahasiswa1);
    }

    public function update()
    {
        $mahasiswa = Student::find(5);

        $mahasiswa->tgl_lahir = '2005-08-20';
        $mahasiswa->alamat = 'Jl. Ampera';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function updateWhere()
    {
        $mahasiswa = Student::where('nim', '2401093006')->first();
        $mahasiswa->alamat = 'Jl. Perintis Kemerdekaan no. 100';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function massUpdate()
    {
        $mahasiswa = Student::where('nim', '2401093022')->first()->update(
            [
                'tempat_lahir' => 'SawahLunto',
                'prodi' => 'Animasi'
            ]
        );

        dd($mahasiswa);
    }

    public function delete()
    {
        $mahasiswa = Student::find(1);
        $mahasiswa->delete();

        dd($mahasiswa);
    }

    public function destroy()
    {
        $mahasiswa = Student::destroy(7);

        dd($mahasiswa);
    }

    public function massDelete()
    {
        $mahasiswa = Student::where('prodi', 'Animasi')->delete();

        dd($mahasiswa);
    }

    public function all()
    {
        $mahasiswa = Student::all();
        foreach ($mahasiswa as $mhs) {
            echo $mhs->id . '<br>';
            echo $mhs->nim . '<br>';
            echo $mhs->nama_lengkap . '<br>';
            echo $mhs->tempat_lahir . '<br>';
            echo $mhs->alamat;
            echo '<hr>';
            // dd($mahasiswa);
        }
    }

    public function allView()
    {
        $students = Student::all();
        return view('akademik.mahasiswa', ['students' => $students]);
    }

    public function getWhere()
    {
        $students = Student::where('prodi','MI')
                      ->orderBy('nama_lengkap','asc')
                      ->get();
        return view('akademik.mahasiswa',['students' => $students]); 
    }

    public function find()
    {
        $students = Student::find(3);
        return view('akademik.mahasiswa',['students' => [$students]]);
    }

    public function first()
    {
        $students = Student::where('prodi','MI')->first();
        return view('akademik.mahasiswa',['students' => [$students]]);
    }
    
    public function latest()
    {
        $students = Student::latest()->get();
        return view('akademik.mahasiswa',['students' => $students]);
    }

    public function limit()
    {
        $students = Student::latest()->limit(2)->get();
        return view('akademik.mahasiswa',['students' => $students]);
    }

    public function skipTake()
    {
        $students = Student::orderBy('id')->skip(1)->take(2)->get();
        return view('akademik.mahasiswa',['students' => $students]);
    }

    public function softDelete()
    {
        Student::where('id','3')->delete();
        return('Data berhasil dihapus');
    }

    public function withTrashed()
    {
        $students = Student::withTrashed()->get();
        return view('akademik.mahasiswa',['students' => $students]);
    }

    public function restore()
    {
        Student::withTrashed()->where('id','3')->restore();
        return 'Berhasil di restore';
    }

    public function forceDelete()
    {
        Student::where('id','3')->forceDelete();
        return ('Data berhasil dihapus secara permanent');
    }

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

    public function insertPrepared()
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
        ) VALUES (?,?,?,?,?,?,?,?,?)", [
            '2401093001',
            'Adip Habibullah',
            'Pasaman',
            '2004-08-28',
            'riyikjir@gmail.com',
            'MI',
            'Jl. Pauh Cupak Tangah',
            NOW(),
            NOW()
        ]);
    }

    public function InsertBinding()
    {
        $query = DB::insert(
            "INSERT INTO students (nim, nama_lengkap,
        tempat_lahir, tgl_lahir, email, prodi, alamat, created_at, updated_at) 
        VALUES
            (:nim, :nama_lengkap, :tempat_lahir, :tgl_lahir,
            :email, :prodi, :alamat, :created_at, :updated_at)",
            [
                'nim' => '2401093022',
                'nama_lengkap' => 'Annisa Marsya',
                'tempat_lahir' => 'Sawah Lunto',
                'tgl_lahir' => '2005-08-09',
                'email' => 'acca@gmail.com',
                'prodi' => 'MI',
                'alamat' => 'Jl. Limau Manih',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        );
    }

    // public function update()
    // {
    //     $query = DB::update("UPDATE students SET email = 'annisaMarsya@gmail.com'
    //                             WHERE nama_lengkap=?", ['Annisa Marsya']);
    // }

    // public function delete()
    // {
    //     $query=DB::delete("DELETE FROM students 
    //                         WHERE id=?",['Annisa Marsya']);
    // }

    public function select()
    {
        $query = DB::select("SELECT * FROM students");
        dd($query);
    }

    public function selectTampil()
    {
        $query = DB::select("SELECT * FROM students");
        echo ($query[0]->id) . "<br/>";
        echo ($query[0]->nim) . "<br/>";
        echo ($query[0]->nama_lengkap) . "<br/>";
        echo ($query[0]->email) . "<br/>";
        echo ($query[0]->alamat);
    }

    public function selectView()
    {
        $query = DB::select("SELECT * FROM students");
        return view('akademik.mahasiswa', ['students' => $query]);
    }

    public function selectWhere()
    {
        $query = DB::select("SELECT * FROM students WHERE prodi=? 
        ORDER BY nim ASC", ['MI']);
        return view('akademik.mahasiswa', ['students' => $query]);
    }

    public function statement()
    {
        $query = DB::statement("TRUNCATE students");
        return ('Tabel mahasiswa sudah kosong');
    }
}
