@extends('layouts.backend')

@section('content')
 <!-- Small boxes (Stat box) -->
 <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $pemiliklahan }}</h3>

                <p>Data Pemilik Lahan</p>
              </div>
              <div class="icon">
                <i class="fas fa-child"></i>
              </div>
              <a href="/pemiliklahan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $datalahan}}</h3>

                <p>Data Lahan</p>
              </div>
              <div class="icon">
                <i class="fas fa-sitemap"></i>
              </div>
              <a href="/datalahan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $user}}</h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $prediksiluas }}</h3>

                <p>Prediksi Luas Lahan</p>
              </div>
              <div class="icon">
                <i class=" fas fa-globe"></i>
              </div>
              <a href="/prediksiluas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
@endsection
