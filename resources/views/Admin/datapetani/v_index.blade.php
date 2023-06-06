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
                      <td class="text-center">Id Petani</td>
                      <td class="text-center">Nama Petani</td>
                      <td class="text-center">Alamat</td>
                      <td class="text-center">Tanggal Lahir</td>
                      <td class="text-center">Luas Lahan</td>
                      <td class="text-center">Action</td>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no=1; ?>
                    @foreach ($datapetani as $data)
                    <tr>
                      <td class="text-center">{{ $no++}}</td>
                      <td>{{ $data->nama_petani }}</td>
                      <td>{{ $data->alamat }}</td>
                      <td>{{ $data->tanggal_lahir }}</td>
                      <td>{{ $data->luas }}</td>
                      <td>
                        <a href="/data_petani/edit/{{ $data->id_petani}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="/data_petani/delete/{{ $data->id_petani}}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
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