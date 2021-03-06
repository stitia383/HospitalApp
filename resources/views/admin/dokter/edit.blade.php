@extends('layouts.master')
@section('content')
@section('title', 'Edit Data Dokter')
<div class="container">
    <!-- Begin Page Content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="">dokter</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header with-border">
                                <h3 class="card-title"></h3>
                            </div>
                                @if (session('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    {!! session('error') !!}</div>
                                @endif
                                <form action="{{route('dokterupdate', $dokter->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama dokter</label>
                                        <input type="text" name="name" required
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{$dokter->name}}">
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipe Dokter</label>
                                        <select name="id_doctor_type" id="id_doctor_type"
                                        required
                                            class="form-control {{ $errors->has('id_doctor_type') ? 'is-invalid':'' }}">
                                    <option value="{{$dokter->id_doctor_type}}">Pilih</option>
                                            @foreach ($doctor_type as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $dokter->id_doctor_type ? 'selected':'' }}>
                                                {{ ucfirst($row->doctor_type) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('id_doctor_type') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control"
                                    required class="form-control {{ $errors->has('gender') ? 'is-invalid':'' }}" value="{{$dokter->gender}}">
                                        <p class="text-danger">{{ $errors->first('gender') }}</p>>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-send"></i> Simpan
                                        </button>
                                    </div>
                                </form>
                                <div class="card-body"></div> </div>
                    </section>
    </div>
    </div>
    </div>


@endsection
