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
        $kategoriGaleri=kategoriGaleri::pluck('nama','id');
        $laravel=null;
        
        return view('galeri.create', compact('kategoriGaleri','laravel'));
    }
    public function store(Request $request){
        $input= $request->except('path');

        $Galeri=galeri::create($input);

        if ($request->has('path')){
            $file=$request->file('path');
            $filename=$Galeri->id.'.'.$file->getClientOriginalExtension();
            $path=$request->path->storeAs('public/galeri',$filename,'local');
            $Galeri->path="storage". substr($path,strpos($path,'/'));
            $Galeri->save();
        }


              
        return redirect(route('galeri.index'));
    }
    public function edit($id){
        $Galeri=galeri::find($id);
        $kategoriGaleri=kategoriGaleri::pluck('nama','id');
        $laravel=kategoriGaleri::pluck('nama','id');

        if(empty($Galeri)){
            return redirect (route('galeri.index'));
        }
        return view('galeri.edit', compact('Galeri','kategoriGaleri','laravel'));
    }
    public function update($id, Request $request){
        $Galeri=galeri::find($id);
        $input=$request->all();

        if(empty($Galeri)){
            return redirect (route('galeri.index'));
        }
        $Galeri->update($input);

        return redirect(route('galeri.index'));
    }

    public function destroy($id){
        $Galeri=galeri::find($id);

        if(empty($Galeri)){
            return redirect (route('galeri.index'));
        }
        $Galeri->delete();
        return redirect (route('galeri.index'));
    }
}
