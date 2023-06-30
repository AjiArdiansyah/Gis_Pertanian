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

            <form action="/user/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name')}}" placeholder="Nama User">
                            <div class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email')}}" placeholder="E-mail">
                            <div class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" value="{{ old('password')}}" placeholder="Password">
                            <div class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        </div>


                    
                        <div class="form-group">
                            <label>Foto User</label>
                            <input type="file" name="foto" class="form-control" accept="image/jpeg,image/jpg,image/png">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="text-danger">
                            @error('foto')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

              
     


</div>
<div class="card-footer">
    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Simpan</button>
    <a href="/user" class="btn btn-warning float-right">Cancel</a>
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