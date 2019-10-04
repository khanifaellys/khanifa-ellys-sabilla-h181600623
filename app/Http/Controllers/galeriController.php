<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\galeri;
use App\kategoriGaleri;

class GaleriController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $Galeri=galeri::all(); //select * from kategori_galeri

        //blade
        return view ('galeri.index', compact('Galeri'));
    }

    public function show($id){
        //Eloquent
        //$kategoriGaleri=KategoriGaleri::where('id',$id)->first();//select * from kategori_galeri where id=$id limit 1
        $Galeri=galeri::find($id);

        return view('galeri.show',compact('Galeri'));
    }
    public function create(){
        $kategori_galeri=kategoriGaleri::pluck('nama','id');
        return view('galeri.create', compact('kategori_galeri'));
    }
    public function store(Request $request){
        $input= $request->all();

        galeri::create($input);
              
        return redirect(route('galeri.index'));
    }
}
