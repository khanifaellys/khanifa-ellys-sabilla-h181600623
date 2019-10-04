<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artikel;
use App\kategoriArtikel;

class ArtikelController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $Artikel=artikel::all(); //select * from kategori_artikel

        //blade
        return view ('artikel.index', compact('Artikel'));
    }

    public function show($id){
        //Eloquent
        //$kategoriArtikel=KategoriArtikel::where('id',$id)->first();//select * from kategori_artikel where id=$id limit 1
        $Artikel=artikel::find($id);

        return view('artikel.show',compact('Artikel'));
    }
    public function create(){
        $kategori_artikel=KategoriArtikel::pluck('nama','id');
        return view('artikel.create', compact('kategori_artikel'));
    }
    public function store(Request $request){
        $input= $request->all();

        artikel::create($input);
              
        return redirect(route('artikel.index'));
    }
}
