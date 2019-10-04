<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pengumuman;
use App\kategoriPengumuman;

class PengumumanController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $Pengumuman=pengumuman::all(); //select * from kategori_pengumuman

        //blade
        return view ('pengumuman.index', compact('Pengumuman'));
    }

    public function show($id){
        //Eloquent
        //$kategoriPengumuman=KategoriPengumuman::where('id',$id)->first();//select * from kategori_pengumuman where id=$id limit 1
        $Pengumuman=pengumuman::find($id);

        return view('pengumuman.show',compact('Pengumuman'));
    }
    public function create(){
        $kategori_pengumuman=KategoriPengumuman::pluck('nama','id');
        return view('pengumuman.create', compact('kategori_pengumuman'));
    }
    public function store(Request $request){
        $input= $request->all();

        pengumuman::create($input);
              
        return redirect(route('pengumuman.index'));
    }
}
