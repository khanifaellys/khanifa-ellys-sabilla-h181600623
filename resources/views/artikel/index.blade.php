@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Artikel</div>

                <div class="card-body">
              
                <table border="1">
                     <tr>
                         <td>ID</td>
                         <td >Judul</td>
                         <td>Users id</td>
                         <td>Create</td>
                         <td>Aksi</td>
                     </tr>

                     @foreach($Artikel as $item)

                    <tr>
                        <td>{!! $item->id !!}</td>
                        <td>{!! $item->judul !!}</td>
                        <td>{!! $item->users_id !!}</td>
                        <td>{!! $item->created_at->format('d/m/Y H:i:s') !!}</td>
                        <td>
                            <a href="{!! route('artikel.show',[$item->id]) !!}"class="btn btn-sm btn-success">
                            Lihat
                            </a>
                        </td>
                    </tr>

                     @endforeach
    
                </table>
                <a  href="{!! route('artikel.create') !!}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection