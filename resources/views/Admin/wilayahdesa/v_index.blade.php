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
                      <td width="50px" class="text-center">No</td>
                      <td class="text-center">Wilayah Desa</td>
                      <td width="50px" class="text-center">Warna</td>
                      
                      <td width="100px"  class="text-center">Action</td>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no=1; ?>
                    @foreach ($wilayahdesa as $data)
                    <tr>
                      <td class="text-center">{{ $no++}}</td>
                      <td>{{ $data->wilayah_desa }}</td>
                      <td style="background-color: {{ $data->warna }}"></td>
                      
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

<!-- bootstrap color picker -->
<script src="{{ asset('AdminLTE') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
