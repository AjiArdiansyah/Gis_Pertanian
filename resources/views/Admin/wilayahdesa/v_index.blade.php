@extends('layouts.backend')

@section('content')

<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>

                <div class="card-tools">
                  <a href="/wilayah_desa/add" type="button" class="btn btn-primary btn-sm btn-flat" ><i class="fa fa-plus"></i>Add</a>
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
                      <th width="5px" class="text-center">No</th>
                      <th width="50px" class="text-center">Wilayah Desa</th>
                      <th width="15px" class="text-center">Warna</th>
                      <th width="150px" class="text-center">Geojson</th>
                      <th width="10px"  class="text-center">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no=1; ?>
                    @foreach ($wilayahdesa as $data)
                    <tr>
                      <td class="text-center">{{ $no++}}</td>
                      <td>{{ $data->wilayah_desa }}</td>
                      <td style="background-color: {{ $data->warna }}"></td>
                      <td>{{ $data->geojson }}</td>
                      <td>
                      <a href="/wilayah_desa/edit/{{ $data->id_wilayahdesa}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_wilayahdesa }}"><i class="fa fa-trash"></i></button>
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

          @foreach ($wilayahdesa as $data)
          <div class="modal fade" id="delete{{ $data->id_wilayahdesa }}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $data->wilayah_desa }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Ingin Menghapus Data Ini...?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="/wilayah_desa/delete/{{ $data->id_wilayahdesa }}" type="button" class="btn btn-outline-light">Save</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

          @endforeach
@endsection

<!-- bootstrap color picker -->
<script src="{{ asset('AdminLTE') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

