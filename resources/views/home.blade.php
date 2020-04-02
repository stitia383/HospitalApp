@extends('layouts.master')
@section('content')
@section('title', 'Dashboard')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
</div>
<div class="container-fluid">
    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @if (Auth::user()->id_roles == '1' || Auth::user()->id_roles == '2')
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Perawat</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nurse->count()}}</div>
                                <a href="{{route('perawat.index')}}">Lihat</a>
                              </div>
                              <div class="col-auto">
                                <i class="fa fa-female fa-2x"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
        @if (Auth::user()->id_roles == '1')
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Dokter</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{($doctor->count())}}</div>
                      <a href="/dokter">Lihat</a>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-
                      male fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endif
        @if(Auth::user()->id_roles == '3')
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pasien</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$patient->count()}}</div>
                            <a href="/pasien">Lihat</a>
                          </div>
                          <div class="col">
                          </div>
                        </div>
                      </div>

                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x "></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @if(Auth::user()->id_roles == '3' || Auth::user()->id_roles == '2')
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Riwayat Pasien</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$history->count()}}</div>
                      <a href="{{route('riwayatpasien.index')}}">Lihat</a>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x "></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @endif
                </div>
            </div>
        </div>
    </section>
</div>
</div>



@endsection
