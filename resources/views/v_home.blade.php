@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $pemiliklahan }}</h3>
                <p>Data Pemilik Lahan</p>
            </div>
            <div class="icon">
                <i class="fas fa-child"></i>
            </div>
            <a href="/pemilik_lahan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $datalahan }}</h3>
                <p>Data Lahan</p>
            </div>
            <div class="icon">
                <i class="fas fa-sitemap"></i>
            </div>
            <a href="/data_lahan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $user }}</h3>
                <p>User</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $prediksiluas }}</h3>
                <p>Prediksi Luas Lahan</p>
            </div>
            <div class="icon">
                <i class="fas fa-globe"></i>
            </div>
            <a href="/prediksi_luas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div id="container" style="width:100%; height:400px;"></div>
<div id="container2" style="width:100%; height:400px;"></div>
<div id="container3" style="width:100%; height:400px;"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
$(document).ready(function() {
    $.ajax({
        url: '/grafik/shoelace',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Luas Lahan Sawah'
                },
                xAxis: {
                    categories: [
                        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    title: {
                        text: 'Luas Lahan Sawah M²'
                    }
                },
                series: [{
                    name: 'Sawah',
                    data: data
                }]
            });
        }
    });
});

$(document).ready(function() {
            $.ajax({
                url: '/grafik/perubahan',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Pastikan data yang diterima memiliki format yang benar
                    if (data && data.labels && data.data) {
                        Highcharts.chart('container2', {
                            chart: {
                                type: 'area' // Menggunakan grafik area untuk perubahan
                            },
                            title: {
                                text: 'Grafik Perubahan Bulanan'
                            },
                            xAxis: {
                                categories: data.labels, // Label bulan
                                crosshair: true
                            },
                            yAxis: {
                                title: {
                                    text: 'Perubahan'
                                }
                            },
                            series: [{
                                name: 'Perubahan',
                                data: data.data // Data perubahan
                            }]
                        });
                    } else {
                        // Tampilkan pesan jika data tidak sesuai
                        console.error('Data tidak sesuai atau kosong.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan dalam permintaan AJAX:', error);
                }
            });
        });


        $(document).ready(function() {
    $.ajax({
        url: '/grafik/totalkeseluruhan', // Sesuaikan dengan rute yang Anda tentukan di Laravel
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Pastikan data yang diterima memiliki format yang benar
            if (data && data.labels && data.data) {
                Highcharts.chart('container3', {
                    chart: {
                        type: 'area' // Menggunakan grafik area untuk perubahan
                    },
                    title: {
                        text: 'Grafik total luas'
                    },
                    xAxis: {
                        categories: data.labels, // Label bulan
                        crosshair: true
                    },
                    yAxis: {
                        title: {
                            text: 'luas total M²'
                        }
                    },
                    series: [{
                        name: 'Perubahan',
                        data: data.data // Data perubahan
                    }]
                });
            } else {
                // Tampilkan pesan jika data tidak sesuai
                console.error('Data tidak sesuai atau kosong.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Terjadi kesalahan dalam permintaan AJAX:', error);
        }
    });
});

</script>


@endsection