@extends('layout.master')

@section('title', "Halaman List Prodi")

@section('content')
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Program Studi</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ url("/") }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Program Studi</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Program Studi</h3>
                    <div class="card-tools">
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-collapse"
                        title="Collapse"
                      >
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Prodi</th>
                                <th>Kode Prodi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $listprodi as $prodi )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$prodi->nama}}</td>
                                <td>{{$prodi->kode_prodi}}</td>
                                <td>
                                    <a href="{{ url('prodi/'.$prodi->id.'/edit')}}" >Edit</a>
                                    <form action="{{url('prodi/'.$prodi->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (session("status"))
                      <div class="alert alert-success">
                        {{ session("status")}}
                      </div>
                    @endif  

                    <a href="{{url("/prodi/create" )}}" class="btn btn-small btn-success">
                        Buat Prodi Baru
                    </a>
                   <table class="table table-bordered mt-2">
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach ($listprodi as $prodi) 
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$prodi->kode_prodi}}</td>
                        <td>{{$prodi->nama}}</td>
                        <td>
                          <form action="delete">
                            <a href="{{url("/prodi/".$prodi->id."/edit" )}}" class="btn btn-small btn-warning">
                              Edit
                            </a> 
                            <button type="submit" class="btn btn-small btn-danger">Delete</button>
                          </form>  
                        </td>
                      </tr>
                    @endforeach
                   </table>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">Footer</div>
                  <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
@endsection

