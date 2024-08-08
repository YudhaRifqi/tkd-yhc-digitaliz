@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Kursus</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('kursusPage-tambah')}}" class="btn icon icon-left btn-primary mb-3"><i data-feather="edit-2"></i> Tambah Data Kursus</a>
                </div>
            </div>
            <!-- ini untuk notifikasi alert-->
            @if(session('success_message'))
            <div class="alert alert-success">
                {{session('success_message')}}
            </div>
            @endif
            <!-- end-->
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>Judul Kursus</th>
                                        <th>Deskripsi</th>
                                        <th>Durasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kursus as $data)
                                    <tr>
                                        <td class="text-bold-500">{{$data->judul}}</td>
                                        <td class="text-bold-500">{{$data->deskripsi}}</td>
                                        <td class="text-bold-500">{{$data->durasi}}</td>
                                        <td class="text-bold-500">
                                            @csrf
                                            @method('delete')
                                            <a href="{{Route('kursusPage-ubah', $data->id)}}" class="btn icon btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{Route('kursusPage-hapus', $data->id)}}" data-confirm-delete="true" class="btn icon btn-danger"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('sweetalert::alert')
@endsection