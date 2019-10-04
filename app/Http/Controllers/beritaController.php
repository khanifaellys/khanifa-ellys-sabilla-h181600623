<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\berita;
use App\kategoriBerita;

class BeritaController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $Berita=berita::all(); //select * from kategori_berita

        //blade
        return view ('berita.index', compact('Berita'));
    }

    public function show($id){
        //Eloquent
        //$kategoriBerita=KategoriBerita::where('id',$id)->first();//select * from kategori_berita where id=$id limit 1
        $Berita=berita::find($id);

        return view('berita.show',compact('Berita'));
    }
    public function create(){
        $kategori_berita=KategoriBerita::pluck('nama','id');
        return view('berita.create', compact('kategori_berita'));
    }
    public function store(Request $request){
        $input= $request->all();

        berita::create($input);
              
        return redirect(route('berita.index'));
    }
}
