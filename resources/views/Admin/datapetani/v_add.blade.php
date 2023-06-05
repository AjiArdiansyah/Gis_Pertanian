@extends('layouts.backend')

@section('content')

<div class="col-md-12">
           
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/data_petani/insert" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Petani</label>
                    <input name="nama_petani" class="form-control" id="exampleInputEmail1" placeholder="Nama Petani">
                    <div class="text-danger">
                        @error('nama_petani')
                        {{$message}}
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Alamat">
                    <div class="text-danger">
                        @error('alamat')
                        {{$message}}
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Luas</label>
                    <input name="luas" class="form-control" id="exampleInputPassword1" placeholder="Luas">
                    <div class="text-danger">
                        @error('luas')
                        {{$message}}
                        @enderror
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

              </form>
            </div>
            <!-- /.card -->
              </div>
              <!-- /.card-body -->
            </div>
      

@endsection