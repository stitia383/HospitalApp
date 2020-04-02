@extends('layouts.master')
@section('content')
@section('title', 'Data Pasien')
<div class="container-fluid">
    . <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Pasien</h6>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>`
                        <th>Jenis Kelamin</th>
                        <th>Foto</th>
                        <th style="text-align:center;">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modal-default">
                                <i class="fa fa-plus"></i> Tambah data
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data_pasien as $pasien)
                    <tr>
                        <td>{{$pasien->name}}</td>
                        <td>{{$pasien->address}}</td>
                        <td>{{$pasien->no_hp}}</td>
                        <td>{{$pasien->gender}}</td>
                        <td>
                            <img src="{{asset('photo/'.$pasien->photo)}}" alt="" width="100px" height="75px">
                        </td>
                        <td width="25%" style="text-align:center;">
                            <a href="" class="btn btn-info btn-sm"><i class="fa fa-child"></i> Diagnosa Penyakit</a>
                            <!-- Button trigger modal -->
                            <a href="{{route('pasienedit', $pasien->id)}}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('pasiendestroy', $pasien->id)}}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                        onclick="return(confirm('Anda yakin ingin menghapus data ini?'))"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- modal tambah data --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" class="h3 mb-0 text-gray-800">Tambah data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('pasienstore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama pasien" name="name">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" rows="3" class="form-control"
                            placeholder="Alamat pasien"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" placeholder="No Handphone wali" name="no_hp">
                    </div>

                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <input type="file" id="photo" name="photo">

                        <p class="help-block">foto kartu tanda penduduk</p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</section>
</div>



@stop
