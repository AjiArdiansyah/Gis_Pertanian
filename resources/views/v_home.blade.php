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
                <p>Luas Lahan</p>
            </div>
            <div class="icon">
                <i class="fas fa-globe"></i>
            </div>
            <a href="/prediksi_luas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div id="container" style="width:100%; height:400px;"></div>

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
                    text: 'Grafik Prediksi Shoelace'
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
                        text: 'Shoelace M²'
                    }
                },
                series: [{
                    name: 'Shoelace',
                    data: data
                }]
            });
        }
    });
});
</script>
@endsection