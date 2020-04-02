@extends('layouts.master')
@section('content')
@section('title', 'Riwayat Pasien')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Pasien</h1>
    <form action="{{route('riwayatpasien.create')}}">
        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Tambah Data</button></form>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Riwayat Pasien</h6>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                @if (session('success'))
                <div class="alert alert-primary alert-dismissible">
                {!! session('success') !!}
                </div>
                @endif
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nama Dokter</th>
                        <th>Diagnosa Penyakit</th>
                        <th>Status Pengobatan</th>
                        <th>No Rawat Inap</th>
                        <th style="text-align:center;">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($history as $row)
                    <tr>
                        <td>
                            <sup class="label label-success">({{ $row->id }})</sup>
                            <strong>{{ ucfirst($row->patient->name) }}</strong>
                        </td>
                        <td>{{ $row->doctor->name }}</td>
                        <td>{{$row->disease}}</td>

                        <td>{{$row->treatmentstatus->status}} </td>
                        <td>{{$row->id_inpatients}}</td>
                        <td>
                        <form action="{{route('riwayatpasien.destroy', $row->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('riwayatpasien.edit', $row->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
