@csrf
<div class="form-group row">
    <label for="judul" class="col-md-2 col form-label text-md-right">{{__('Judul')}}</label>

    <div class="col-md-10">
    <input id="judul"  type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required autofocus>

    @error('judul')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $messege }}</strong>
    </span>
    @enderror
    </div

    <div class="form-group row">
    <label for="isi" class="col-md-2 col form-label text-md-right">{{__('isi')}}</label>

    <div class="col-md-10">
    <input id="isi"  type="text" class="form-control @error('isi') is-invalid @enderror" name="isi" value="{{ old('isi') }}" required autofocus>

    @error('judul')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $messege }}</strong>
    </span>
    @enderror
    </div


<div class="form-group row">
    <label for="kategori_pengumuman_id" class="col-md-2 col form-label text-md-right">{{__('Kategori pengumuman')}}</label>

    <div class="col-md-10">
    {!! Form::select('kategori_pengumuman_id', $kategori_pengumuman,null, ["class"=> "form-control", "required"]) !!}

    @error('kategori_pengumuman_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $messege }}</strong>
    </span>
    @enderror
    </div>
</div>


<input id="users_id" type="hidden" class="form-control @error('users_id') is-invalid @enderror" name="users_id" value="{{ Auth::id() }}" required autofocus>

                        <div class="col-md-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan Data') }}
                                </button>
                                <a  href="{!! route('pengumuman.index') !!}" class="btn btn-danger">
                                    {{ __('Batal') }}
                                </a>
              
                            </div>
                        </div>