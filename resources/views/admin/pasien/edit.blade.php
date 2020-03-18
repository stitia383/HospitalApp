@extends('layouts.master')
@section('content')
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
                            <li class="breadcrumb-item"><a href="">Pasien</a></li>
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
                                <form action="{{route('pasienupdate', $pasien->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nama pasien" name="nama" value="{{$pasien->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Alamat</label>
                                            <textarea name="address" id="address" rows="3" class="form-control"
                                        placeholder="Alamat pasien" value="{{$pasien->address}}"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_hp">No HP</label>
                                        <input type="text" class="form-control" id="no_hp" placeholder="No Handphone wali" name="no_hp" value="{{$pasien->no_hp}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control" value="{{$pasien->gender}}">
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <img src="{{asset('photo/'. $pasien->photo)}}" alt="" width="100px"><br><br>
                                        <div class="form-group">
                                            <label for="photo">Foto</label>
                                        <input type="file" id="photo" name="photo" value="{{$pasien->photo}}">

                                            <p class="help-block">foto kartu tanda penduduk</p>
                                        </div>
                                </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                                <div class="card-body"></div> </div>
                    </section>
    </div>
    </div>
    </div>


@endsection
