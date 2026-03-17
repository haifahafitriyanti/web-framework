<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function(){
    echo "Halaman Home <br>";
    echo "Baris Kedua";
});

//route parameter
Route::get('/mahasiswa3/ti/haifa',function(){
    echo "Selamat Datang Haifa Pintar 3.93";
});

Route::get('/mahasiswa3/{nama}', function($nama){
    return "Selamat datang $nama";
});

Route::get('/mahasiswa3/{nama}/{nim}', function($nama, $nim){
    return "Selamat datang orang pintar bernama $nama, NIM $nim";
});

// route optional parameter
// Route::get('/dosen/{nama?}/{nip?}', function($nama = "", $nip = ""){
//     return "Selamat datang $nama, NIP $nip";
// });

//route redirect
Route::redirect('/home','/');

//route fallback
Route::fallback(function(){
    return "Halaman Tidak Ditemukan";   
});

Route::get('/mahasiswa1',function(){
    $arrMhs = [
        'mhs1' => 'Haifa Hafitriyanti',
        'mhs2' => 'Haifa'
    ];
    //return view('akademik.mahasiswa',$arrMhs); //parameter ke-2 view
    return view('akademik.mahasiswa1')->with($arrMhs); //method with()
});

Route::get('/mahasiswa2',function(){
    $nama = 'Haifa Hafitriyanti';
    $nim = '2401093006';
    $total_nilai = 100;
    return view('akademik.nilai_mahasiswa', compact('nama','nim','total_nilai'));
});

Route::get('/perulangan1', function(){
    return view('akademik.perulangan1');
});

Route::get('/perulangan2', function(){
    $nama = 'Haifa';
    $nim = '2401093006';
    $total_nilai = [98,85,49];
    return view('akademik.perulangan2', compact('nama','nim','total_nilai'));
});

Route::get('/perulangan3', function(){
    $nama = 'Bill gates';
    $nim = '2401093025';
    $total_nilai = [80,70,20,60,45];
    return view('akademik.perulangan3', compact('nama','nim','total_nilai'));
});

Route::get('/mahasiswa', function(){
    $arrMhs = [
        'Haifa Hafitriyanti', 
        'Adip Habibullah', 
        'Alvika Fradisi', 
        'Allya Triananda', 
        'Atiya Puti Betriyona',
        'Annisa Marsya',
        'Farhad Khan',
        'Farhan Najman',
    ];
    return view('akademik.mahasiswa',['mhs'=>$arrMhs]);
});

Route::get('/dosen', function(){
    $arrDosen = ['Roni Saputra', 'Yori Adi Atma', 'Deni S', 'Fazrol R', 'Ervan A'];
    return view('akademik.dosen',['dosen'=>$arrDosen]);
});

Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan, $prodi) {
    $data = [$jurusan, $prodi];
    return view('akademik.prodi')->with('data', $data);
})->name('prodi');