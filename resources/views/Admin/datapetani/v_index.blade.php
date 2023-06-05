@extends('layouts.backend')

@section('content')

<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>

                <div class="card-tools">
                  <a href="/data_petani/add" type="button" class="btn btn-primary btn-sm btn-flat" ><i class="fa fa-plus"></i>Add</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('pesan'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> {{ session('pesan') }}</h5> 
                </div>
                @endif
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td>Id Petani</td>
                      <td>Nama Petani</td>
                      <td>Alamat</td>
                      <td>Tanggal Lahir</td>
                      <td>Luas Lahan</td>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no=1; ?>
                    @foreach ($datapetani as $data)
                    <tr>
                      <td>{{ $no++}}</td>
                      <td>{{ $data->nama_petani }}</td>
                      <td>{{ $data->alamat }}</td>
                      <td>{{ $data->tanggal_lahir }}</td>
                      <td>{{ $data->luas }}
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

@endsection