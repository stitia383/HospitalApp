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
                            <li class="breadcrumb-item"><a href="">riwayat pasien</a></li>
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
                                <form action="{{route('riwayatpasien.update', $history->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id_patient">Nama Pasien</label>
                                        <select name="id_patient" id="id_patient
                                        required
                                            class="form-control {{ $errors->has('id_patient') ? 'is-invalid':'' }}">
                                    <option value="{{$history->id_patient}}">Pilih</option>

                                        </select>
                                        <p class="text-danger">{{ $errors->first('id_patient') }}</p>
                                    </div>

                                </form>
                                <div class="card-body"></div> </div>
                    </section>
    </div>
    </div>
    </div>



@stop
