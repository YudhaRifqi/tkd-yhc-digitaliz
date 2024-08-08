@extends('layouts/main')
@section('content')
<div class="page-heading">
    <h3>Form Ubah Data Materi</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{Route('materiPage-ubahUpdate', $materi->id)}}" method="post">
                            @csrf
                            @method('put')
                            <fieldset class="form-group">
                                <label for="kursus_id">Kursus</label>
                                <select class="form-select" id="kursus_id" name="kursus_id">
                                    @foreach($kursus as $k)
                                    <option value="{{ $k->id }}" {{ $k->id == $materi->kursus_id ? 'selected' : '' }}>
                                        {{ $k->judul }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kursus_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <div class="form-group">
                                <label for="judul">Judul Materi</label>
                                <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" value="{{$materi->judul}}">
                                @error('judul')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" autocomplete="off" value="{{$materi->deskripsi}}">
                                @error('deskripsi')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link_embed">Link Embed</label>
                                <input type="text" class="form-control" id="link_embed" name="link_embed" autocomplete="off" value="{{$materi->link_embed}}">
                                @error('link_embed')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            <a href="{{Route('materiPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection