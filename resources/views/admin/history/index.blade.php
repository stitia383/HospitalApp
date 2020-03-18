@extends('layouts.master')
@section('content')
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

                                <td>@if($row->id_treatment_statues == '1')
                                <a href="{{route('riwayatpasien.show', $row->id)}}" type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus"></i></a>
                                    @endif
                                </td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action = "{{route('rawatinap.store')}}">
                <div class="form-group">
                    <label for="room number">Nomor Kamar </label>
                    <input type="text" class="form-control" id="room number" placeholder="Patient room number" name="room number">
                </div>
                <div class="form-group">
                    <label for="">Nama Perawat</label>
                    <select name="id_doctor" id="id_doctor"
                    required
                        class="form-control {{ $errors->has('id_doctor') ? 'is-invalid':'' }}">
                        <option value="">Pilih</option>
                        @foreach ($nurse as $row)
                        <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('id_doctor') }}</p>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection
