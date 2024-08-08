@extends('layouts/main')
@section('content')
<div class="page-heading">
    <h3>Form Ubah Data Kursus</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{Route('kursusPage-ubahUpdate', $kursus->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="judul">Judul Kursus</label>
                                <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" value="{{$kursus->judul}}">
                                @error('judul')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" autocomplete="off" value="{{$kursus->deskripsi}}">
                                @error('deskripsi')
                                <p class=" text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi</label>
                                <input type="text" class="form-control" id="durasi" name="durasi" autocomplete="off" value="{{$kursus->durasi}}">
                                @error('durasi')
                                <p class=" text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            <a href="{{Route('kursusPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection