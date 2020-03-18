@extends('layouts.master')
@section('content')
<div class="container-fluid">
    . <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Dokter</h1>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <div class="col-md-12">

                            <form role="form" action="{{ route('tipedokter.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="doctor_type">Tipe Dokter</label>
                                    <input type="text"
                                    name="doctor_type"
                                    class="form-control {{ $errors->has('doctor_type') ? 'is-invalid':'' }}" id="doctor_type" required>
                                </div>
                                <div class="card-body">
                                <div class="card-footer">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header with-border">
                                <h3 class="card-title">List Tipe Dokter</h3>
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible">

                                    {!! session('success') !!}
                            </div>
                            @endif
                        </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Tipe Dokter</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($doctor_type as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->doctor_type}}</td>
                                            <td>
                                                <form action="{{ route('tipedokter.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button></button>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            <form role="form" action="{{ route('tipedokter.update', $errors->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="doctor_type">Tipe Dokter</label>
                    <input type="text"
                    name="doctor_type"
                    class="form-control {{ $errors->has('doctor_type') ? 'is-invalid':'' }}" id="doctor_type" required>
                </div>
                <div class="modal-footer">
                </div>
                <div class="card-body">
                <div class="card-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>
   @endsection
