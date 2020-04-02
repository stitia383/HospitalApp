@extends('layouts.master')
@section('content')
@section('title', 'Edit Riwayat Pasien')
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
                                <form action="{{route('riwayatpasien.update', $history->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <select name="id_patient" id="id_patient"
                                        required
                                            class="form-control {{ $errors->has('id_patient') ? 'is-invalid':'' }}">
                                    <option value="{{$history->id_patient}}">Pilih</option>
                                            @foreach ($patient as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $history->id_patient ? 'selected':'' }}>
                                                {{ ucfirst($row->name) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('id_doctor') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Dokter</label>
                                        <select name="id_doctor" id="id_doctor"
                                        required
                                            class="form-control {{ $errors->has('id_doctor') ? 'is-invalid':'' }}">
                                    <option value="{{$history->id_doctor}}">Pilih</option>
                                            @foreach ($doctor as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $history->id_doctor ? 'selected':'' }}>
                                                {{ ucfirst($row->name) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('id_doctor') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penyakit </label>
                                        <input type="text" name="disease" required
                                    class="form-control {{ $errors->has('disease') ? 'is-invalid':'' }}" value="{{$history->disease}}">
                                        <p class="text-danger">{{ $errors->first('disease') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status Pengobatan</label>
                                        <select name="id_treatment_statues" id="id_treatment_statues"
                                        required
                                            class="form-control {{ $errors->has('id_treatment_statues') ? 'is-invalid':'' }}">
                                    <option value="{{$history->id_treatment_statues}}">Pilih</option>
                                            @foreach ($status as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $history->id_treatment_statues ? 'selected':'' }}>
                                                {{ ucfirst($row->status) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('id_treatment_statues') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rawat Inap</label>
                                        <select name="id_inpatients" id="id_inpatients"

                                            class="form-control {{ $errors->has('id_inpatients') ? 'is-invalid':'' }}">
                                    <option value="{{$history->id_inpatients}}">Pilih</option>
                                            @foreach ($rawat as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $history->id_inpatients ? 'selected':'' }}>
                                                {{ ucfirst($row->id) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('id_inpatients') }}</p>
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



@stop
@section('select')
<script>
    $(document).ready(function(){
       $('#id_treatment_statues').change(function(){

           var close = $(this).closest('form');
           var treatment_statues = $(this).val();
           var _token = $(this).closest('form').find('[name="_token"]').val();

          if(treatment_statues == '1'){
           $('#id_inpatients').closest('.form-group').show();
           $.ajax({
               method: 'GET',
               url: "{{route('select_room')}}?treatment_statues=" + treatment_statues,
               success: function(result){
                   console.log(result);
                   if(result){
                       $('#id_inpatients').empty();
                       $('#id_inpatients').append('<option>==pilih==</option>');
                       $.each(result, function(key,value){
                           $('#id_inpatients').append('<option value="'+value+'">'+value+'</option>');
                       });
                   }
               }
           })
          }else if(treatment_statues == '2'){
              $('#id_inpatients').closest('.form-group').hide();
          }
       })
    });


   </script>
@endsection
