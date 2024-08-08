@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Materi</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('materiPage-tambah')}}" class="btn icon icon-left btn-primary mb-3"><i data-feather="edit-2"></i> Tambah Data Materi</a>
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
                                        <th>Kursus</th>
                                        <th>Judul Materi</th>
                                        <th>Deskripsi</th>
                                        <th>Link Embed</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materi as $data)
                                    <tr>
                                        <td class="text-bold-500">{{$data->kursus->judul}}</td>
                                        <td class="text-bold-500">{{$data->judul}}</td>
                                        <td class="text-bold-500">{{$data->deskripsi}}</td>
                                        <td class="text-bold-500"><a href="{{$data->link_embed}}" target="_blank"><span class="badge bg-info">Lihat Materi</span></a></td>
                                        <td class="text-bold-500">
                                            @csrf
                                            @method('delete')
                                            <a href="{{Route('materiPage-ubah', $data->id)}}" class="btn icon btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{Route('materiPage-hapus', $data->id)}}" data-confirm-delete="true" class="btn icon btn-danger"><i class="bi bi-trash"></i></a>
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