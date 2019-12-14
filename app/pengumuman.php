<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengumuman extends Model
{
    use SoftDeletes;
    protected $fillable =['judul','isi','users_id','kategori_pengumuman_id'];

    protected $table ='pengumuman';
    
    protected $casts=[
        'deleted_at'=>'datetime'
    ];
}
