<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{

    function index(){
        /*$data = [
            'prodi' => ['Manajemen Informatika', 'Sistem Informasi', 'Informatika']
        ];
    
        //atau menggunakan compact
        $prodi = ['Manajemen Informatika', 'Sistem Informasi', 'Informatika'];
        $kampus = "Universitas Multi Data Palembang";
    
        return view("prodi.index", compact('prodi', 'kampus'));*/

        $kampus = "Universitas Multi Data Palembang";
        $prodi = Prodi::all();

        /*$prodi = DB::select("SELECT prodi.*, fakultas.nama as namaf FROM prodi INNER JOIN fakultas ON prodi.fakultas_id = fakultas.id");*/
        
        return view("prodi.index", compact('kampus', 'prodi'));
    }

    function detail($id = null){
        echo $id;
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        //dump($request);
        //echo $request->nama;

        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);
        //dump($validateData);
        //echo $validateData['nama'];

        $prodi = new prodi(); //buat object prodi
        $prodi->nama = $validateData['nama']//simpan nilai input  ($validateData['nama']) ke dalam property nama prodi ($prodi->nama)

        //return "Data prodi $prodi->nama berhasil disimpan ke database"; //tampilkan pesan berhasil
        $request->session()->flash('into', "Data Prodi $prodi->nama berhasil disimpan ke database");
        return redirect()->route('prodi.create');
    }

    public function index(){
        $prodis = prodi :: all();
        return view('prodi.index')->with('prodis', $prodis);
    }

    public function show(Prodi $prodi)
    {
        return view('prodi.show), ['prodi' => $prodi]);
    }

}
