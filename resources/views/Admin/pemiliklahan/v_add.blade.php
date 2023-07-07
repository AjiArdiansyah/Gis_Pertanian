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
              <form action="/pemilik_lahan/insert" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pemilik Lahan</label>
                    <input name="nama_pemilik" class="form-control" id="exampleInputEmail1" placeholder="Nama Pemilik Lahan">
                    <div class="text-danger">
                        @error('pemilik_lahan')
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
                        <input name="tanggal_lahir" type="date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">keterangan</label>
                    <input name="keterangan" class="form-control" id="exampleInputPassword1" placeholder="Keterangan">
                    <div class="text-danger">
                        @error('keterangan')
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

            <script>
$(document).ready(function() {
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD', // Format tanggal yang diinginkan, sesuaikan dengan kebutuhan Anda
        icons: {
            time: 'fa fa-clock',
            date: 'fa fa-calendar',
            up: 'fa fa-chevron-up',
            down: 'fa fa-chevron-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-calendar-check-o',
            clear: 'fa fa-trash',
            close: 'fa fa-times'
        }
    });
});
</script>
      

@endsection