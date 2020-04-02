@extends('layouts.master')
@section('content')
@section('title', 'Tambah Rawat Inap')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="">dokter</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
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
                            <form action="{{route('rawatinap.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">No Kamar</label>
                                    <input type="text" name="room_number" required
                                        class="form-control {{ $errors->has('room_number') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('room_number') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Perawat</label>
                                    <select name="id_nurse" id="id_nurse"
                                    required
                                        class="form-control {{ $errors->has('id_nurse') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($nurse as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('id_nurse') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Status Pengobatan</label>
                                    <select name="id_treatment_statues" id="id_treatment_statues"
                                    required
                                        class="form-control {{ $errors->has('id_treatment_statues') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($status as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->status) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('id_treatment_statues') }}</p>
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
