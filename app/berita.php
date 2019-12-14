<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class berita extends Model
{
    use SoftDeletes;

    protected $table ="berita";
    protected $fillable =['judul','isi','users_id','kategori_berita_id'];

    protected $casts=[
        'deleted_at'=>'datetime'
    ];
}
