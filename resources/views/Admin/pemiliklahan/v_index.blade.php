@extends('layouts.backend')

@section('content')

<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>

                <div class="card-tools">
                  <a href="/pemilik_lahan/add" type="button" class="btn btn-primary btn-sm btn-flat" ><i class="fa fa-plus"></i>Add</a>
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
                      <th class="text-center">No</th>
                      <th class="text-center">Nama Pemilik Lahan</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Tanggal Lahir</th>
                      <th class="text-center">Keterangan</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no=1; ?>
                    @foreach ($pemiliklahan as $data)
                    <tr>
                      <td class="text-center">{{ $no++}}</td>
                      <td>{{ $data->nama_pemilik }}</td>
                      <td>{{ $data->alamat }}</td>
                      <td>{{ $data->tanggal_lahir }}</td>
                      <td>{{ $data->keterangan }}</td>
                      <td>
                        <a href="/pemilik_lahan/edit/{{ $data->id_pemiliklahan}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pemiliklahan }}"><i class="fa fa-trash"></i></button>
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

          @foreach ($pemiliklahan as $data)
          <div class="modal fade" id="delete{{ $data->id_pemiliklahan }}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $data->nama_pemilik }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Ingin Menghapus Data Ini...?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="/pemilik_lahan/delete/{{ $data->id_pemiliklahan }}" type="button" class="btn btn-outline-light">Save</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

          @endforeach

      

@endsection