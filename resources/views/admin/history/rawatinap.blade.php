@extends('layouts.master')
@section('content')
<div class="container-fluid">
    . <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Rawat Inap</h1>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <b>No Pasien</b>
                                    </div>
                                    <div class="col-sm-10">:
                                        {{$history->id_patient}}</>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                            data-target="#modal-nilai">Tambah
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Rawat Inap</h3>
                    </div>
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px">No Pasien</th>
                                    <th>No Kamar</th>
                                    <th>Nama Perawat</th>
                                    <th style="width: 120px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rawat as $s)
                                <tr>
                                    <td>{{$s->id}}</td>
                                    <td>{{$s->room_number}}</td>
                                    <td>{{$s->id_nurse}}</td>
                                    <td>
                                        <form action="" method="POST"
                                            style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td><b>Total:</b></td>
                                    <td><b>{{$history->inpatient->sum('inpatient')}}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body
                </div>
            </div>
        </div>

    </section>



@endsection
