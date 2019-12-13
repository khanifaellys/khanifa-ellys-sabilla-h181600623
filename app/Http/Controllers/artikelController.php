<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artikel;
use App\kategoriArtikel;

class ArtikelController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $Artikel=artikel::all(); //select * from artikel

        //blade
        return view ('artikel.index', compact('Artikel'));
    }

    public function show($id){
        //Eloquent
        //$Artikel=artikelArtikel::where('id',$id)->first();//select * from artikel where id=$id limit 1
        $Artikel=artikel::find($id);

        return view('artikel.show',compact('Artikel'));
    }
    public function create(){
        $kategoriArtikel=kategoriArtikel::pluck('nama','id');
        $laravel=null;

        return view('artikel.create', compact('kategoriArtikel', 'laravel'));
    }
    public function store(Request $request){
        $input= $request->all();

        artikel::create($input);
              
        return redirect(route('artikel.index'));
    }
    public function edit($id){
        $Artikel=artikel::find($id);
        $kategoriArtikel=kategoriArtikel::pluck('nama','id');
        $laravel=kategoriArtikel::pluck('nama','id');

        if(empty($Artikel)){
            return redirect (route('artikel.index'));
        }
        return view('artikel.edit', compact('Artikel','kategoriArtikel','laravel'));
    }
    public function update($id, Request $request){
        $Artikel=artikel::find($id);
        $input=$request->all();

        if(empty($Artikel)){
            return redirect (route('artikel.index'));
        }
        $Artikel->update($input);

        return redirect(route('artikel.index'));
    }

    public function destroy($id){
        $Artikel=artikel::find($id);

        if(empty($Artikel)){
            return redirect (route('artikel.index'));
        }
        $Artikel->delete();
        return redirect (route('artikel.index'));
    }
}
