@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> {{ session('pesan') }}</h5>
            </div>
            @endif

            <form action="/wilayah_desa/insert" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Wilayah Desa</label>
                            <input type="text" name="wilayah_desa" class="form-control" placeholder="Wilayah Desa">
                            <div class="text-danger">
                        @error('wilayah_desa')
                        {{$message}}
                        @enderror
                    </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Warna</label>

                            <div class="input-group my-colorpicker2">
                                <input name="warna" class="form-control" placeholder="Warna">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <div class="text-danger">
                        @error('warna')
                        {{$message}}
                        @enderror
                    </div>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label>GEOJSON</label>
                        <textarea name="geojson" rows="7" class="form-control" placeholder="Geojson"></textarea>
                    </div>
                </div>
                <div class="text-danger">
                        @error('geojson')
                        {{$message}}
                        @enderror
                    </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Simpan</button>
            <a href="/wilayah_desa" class="btn btn-warning float-right">Cancel</a>
        </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<!-- bootstrap color picker -->
<script src="{{ asset('AdminLTE') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
    //color picker with addon
    $('.my-colorpicker2').colorpicker();
    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
</script>

@endsection

