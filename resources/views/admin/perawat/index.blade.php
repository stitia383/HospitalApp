@extends('layouts.master')
@section('content')
<div class="container-fluid">
    . <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Perawat</h1>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <div class="col-md-12">
                                @if (session('success'))
                <div class="alert alert-primary alert-dismissible">
                {!! session('success') !!}
                </div>
                @endif
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Dokter yang bertanggung jawab</th>
                        <th>Jenis Kelamin</th>
                        <th style="text-align:center;">

                        <a href="{{route('perawat.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah data</a>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nurse as $row)
                    <tr>
                        <td>
                            <sup class="label label-success">({{ $row->id }})</sup>
                            <strong>{{ ucfirst($row->name) }}</strong>
                        </td>
                        <td>{{ $row->doctor->name }}</td>
                        <td>{{$row->gender}}</td>
                        <td>
                        <form action="{{route('perawat.destroy', $row->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('perawat.edit', $row->id)}}" class="btn btn-warning btn-sm">
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
                    @endforelse </tbody>
            </table>
            </div>
                </div>
            </div>
        </div>
        <div class="float-right">
            {!! $nurse->links() !!}
        </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
