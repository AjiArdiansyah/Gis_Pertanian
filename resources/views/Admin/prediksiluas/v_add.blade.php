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

            <form action="/prediksi_luas/insert" method="POST" enctype="multipart/form-data">
                @csrf

               
                    <div class="col-sm-12">
                  <label>Tanggal</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name="tanggal" type="date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    </div>
                  

                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Prediksi</label>
                            <input type="text" name="prediksi" class="form-control" placeholder="Prediksi">
                            <div class="text-danger">
                                @error('prediksi')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>

                
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama Pemilik</label>
                                <select name="id_pemiliklahan" id="id_pemiliklahan" class="form-control">

                                <option value="">--Nama Pemilik--</option>
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


                        <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Lahan</label>
                            <select name="id_datalahan" id="id_datalahan" class="form-control">
                                <option value="">--Nama Lahan--</option>
                                {{-- @foreach ($datalahan as $data)
                                <option value="{{ $data->id_datalahan}}">{{ $data->nama_lahan}}</option>
                                @endforeach --}}
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


                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Luas</label>
                    <input type="text" name="luas" id="luas" class="form-control" />
                    </div>
                    </div>

                    <div class="col-sm-12">
                    <div class="form-group">
                    <label>Geojson</label>
                    <input type="text" name="geojson" id="geojson" class="form-control" />
                    </div>
                    </div>

                   {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label>Luas</label>
                            <select name="luas" class="form-control">
                                <option value="">--Luas--</option>
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
                    </div>--}}
                

                    {{-- <div class="col-sm-12">
                        <div class="form-group">
                            <label>Geojson</label>
                                <select name="geojson" id="geojson" class="form-control">

                                <option value="">--Geojson--</option>
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
                    </div> --}}

                  
</div>
<script>console.log("prediksi_luas")</script>
<div class="card-footer">
    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Simpan</button>
    <a href="/prediksi_luas" class="btn btn-warning float-right">Cancel</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ketika opsi pertama berubah
        $('#id_pemiliklahan').change(function() {
            console.log("asasasa");

            var id_pemiliklahan = $(this).val();
            console.log(id_pemiliklahan);
            if (id_pemiliklahan) {
                // Mengirim permintaan AJAX ke server
                $.ajax({
                    url: '/get-datalahan/' + id_pemiliklahan,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Menghapus semua opsi yang ada
                        $('#id_datalahan').empty();
                        $('#id_datalahan').append('<option value="">--Nama Lahan--</option>');

                        // Menambahkan opsi berdasarkan data yang diterima dari server
                        $.each(data, function(key, value) {
                            $('#id_datalahan').append('<option value="' + value.id_datalahan + '">' + value.nama_lahan + '</option>');
                        });


                    }
                });
            } else {
                // Jika opsi pertama tidak dipilih, hapus semua opsi pada opsi kedua
                $('#id_datalahan').empty();
                $('#id_datalahan').append('<option value="">--Nama Lahan--</option>');
            }
        });
        $('#id_datalahan').change(function() {
            var id_datalahan = $(this).val();
            console.log("TEST121");
            console.log(id_datalahan);
            if (id_datalahan) {
                // Mengirim permintaan AJAX ke server
                $.ajax({
                    url: '/get-geojson/' + id_datalahan,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log("hasil");
                        $('#geojson').empty();
                        console.log(data[0].geojson);
                        // Menampilkan geojson pada input textbox
                        $('#geojson').val(data[0].geojson);
                    }
                });
            } else {
                // Jika opsi kedua tidak dipilih, hapus nilai pada input textbox
                $('#geojson').val('');
            }
        });
    });
</script>




<script>
    $(document).ready(function() {
        // Ketika opsi pertama berubah
        $('#id_datalahan').change(function() {
            console.log("teslahan");

            var id_datalahan = $(this).val();
            console.log(id_datalahan);
            if (id_datalahan) {
                // Mengirim permintaan AJAX ke server
                $.ajax({
                    url: '/get-datalahan/id_datalahan',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Menghapus semua opsi yang ada
                        // $('#id_datalahan').empty();
                        // $('#id_datalahan').append('<option value="">--Luas--</option>');

                        // Menambahkan opsi berdasarkan data yang diterima dari server
                        $.each(data, function(key, value) {
                            $('#id_datalahan').append('<option value="' + value.id_datalahan + '">' + value.luas + '</option>');
                        });
                    }
                });
            } else {
                // Jika opsi pertama tidak dipilih, hapus semua opsi pada opsi kedua
                $('#id_datalahan').empty();
                $('#id_datalahan').append('<option value="">--Luas--</option>');
            }
        });
        $('#id_datalahan').change(function() {
            var id_datalahan = $(this).val();
            console.log("TESTlahan");
            console.log(id_datalahan);
            if (id_datalahan) {
                // Mengirim permintaan AJAX ke server
                $.ajax({
                    url: '/get-luas/' + id_datalahan ,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log("hasil");
                        $('#luas').empty();
                        console.log(data.luas);
                        // Menampilkan data luas pada elemen dengan ID "luas"
                        $('#luas').val(data.luas);
                    }
                });
            } else {
                // Jika opsi kedua tidak dipilih, hapus nilai pada elemen dengan ID "luas"
                $('#luas').val('');
            }
        });
    });
</script>



<!-- <script>
    $(document).ready(function() {
        // ...

        $('form').submit(function(event) {
            event.preventDefault();

            // Mendapatkan nilai input prediksi
            var prediksi = $('input[name="prediksi"]').val();

            // Mendapatkan nilai input id_pemiliklahan
            var idPemilikLahan = $('#id_pemiliklahan').val();

            // Mendapatkan nilai input id_datalahan
            var idDataLahan = $('#id_datalahan').val();

            // Menampilkan nilai prediksi, id_pemiliklahan, dan id_datalahan di konsol
            console.log('Prediksi:', prediksi);
            console.log('ID Pemilik Lahan:', idPemilikLahan);
            console.log('ID Data Lahan:', idDataLahan);

            // Melakukan permintaan AJAX untuk menyimpan data
            // $.ajax({
            //     url: '/prediksi_luas/insert',
            //     type: 'POST',
            //     data: $(this).serialize(),
            //     dataType: 'json',
            //     success: function(response) {
            //         // Menampilkan pesan sukses di konsol
            //         console.log('Data berhasil disimpan:', response);

            //         // Melakukan redirect atau tindakan lain setelah berhasil menyimpan data
            //         // ...
            //     },
            //     error: function(xhr, status, error) {
            //         // Menampilkan pesan error di konsol
            //         console.log('Terjadi kesalahan saat menyimpan data:', error);

            //         // Menampilkan pesan error kepada pengguna
            //         // ...
            //     }
            // });
        });
    });
</script>
 -->



@endsection