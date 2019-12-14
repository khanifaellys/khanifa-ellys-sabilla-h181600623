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
        $kategoriBerita=kategoriBerita::pluck('nama','id');
        $laravel=null;
        
        return view('berita.create', compact('kategoriBerita','laravel'));
    }
    public function store(Request $request){
        $input= $request->all();

        berita::create($input);
              
        return redirect(route('berita.index'));
    }
    public function edit($id){
        $Berita=berita::find($id);
        $kategoriBerita=kategoriBerita::pluck('nama','id');
        $laravel=kategoriBerita::pluck('nama','id');

        if(empty($Berita)){
            return redirect (route('berita.index'));
        }
        return view('berita.edit', compact('Berita','kategoriBerita','laravel'));
    }
    public function update($id, Request $request){
        $Berita=berita::find($id);
        $input=$request->all();

        if(empty($Berita)){
            return redirect (route('berita.index'));
        }
        $Berita->update($input);

        return redirect(route('berita.index'));
    }

    public function destroy($id){
        $Berita=berita::find($id);

        if(empty($Berita)){
            return redirect (route('berita.index'));
        }
        $Berita->delete();
        return redirect (route('berita.index'));
    }
    
}
