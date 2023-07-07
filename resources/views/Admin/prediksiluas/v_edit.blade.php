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

            <form action="/prediksi_luas/update/{{ $prediksiluas->id_prediksiluas}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Pemilik</label>
                            <select name="id_pemiliklahan" class="form-control">
                                <option value="{{ $prediksiluas->id_pemiliklahan}}">{{ $prediksiluas->nama_pemilik}}</option>
                                @foreach ($pemiliklahan as $data)
                                <option value="{{ $data->id_pemiliklahan}}">{{ $data->nama_pemilik}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="text-danger">
                            @error('nama_pemilik')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Lahan</label>
                            <select name="id_datalahan" class="form-control">
                                <option value="{{ $prediksiluas->id_datalahan}}">{{ $prediksiluas->nama_lahan}}</option>
                                @foreach ($datalahan as $data)
                                <option value="{{ $data->id_datalahan}}">{{ $data->nama_lahan}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="text-danger">
                            @error('nama_lahan')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label>Luas</label>
                            <select name="id_pemiliklahan" class="form-control">
                                <option value="{{ $prediksiluas->id_pemiliklahan}}">{{ $prediksiluas->luas}}</option>
                                @foreach ($pemiliklahan as $data)
                                <option value="{{ $data->id_pemiliklahan}}">{{ $data->luas}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="text-danger">
                            @error('luas')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                
                <div class="col-sm-6">
                        <div class="form-group">
                            <label>Geojson</label>
                            <select name="id_datalahan" class="form-control">
                                <option value="{{ $prediksiluas->id_datalahan}}">{{ $prediksiluas->geojson}}</option>
                                @foreach ($datalahan as $data)
                                <option value="{{ $data->id_datalahan}}">{{ $data->geojson}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="text-danger">
                            @error('geojson')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                   

             

                   
               
<div class="card-footer">
    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Simpan</button>
    <button type="submit" class="btn btn-warning float-right">Cancel</button>
</div>
</form>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<script src="{{ asset('js/map.js') }}"></script>

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