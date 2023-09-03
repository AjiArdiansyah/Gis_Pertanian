<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

<!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/summernote/summernote-bs4.css">

  <!-- CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.5.1/leaflet.draw.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.5.1/leaflet.draw.js"></script>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Datepicker CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Datepicker JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


  <!-- Chart-->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://code.highcharts.com/10/highcharts.js"></script>

  <!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- page script -->

<!-- DataTables -->
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE')}}/dist/js/demo.js'"></script>

<!--Leaflet-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
 integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

        <li><a href="#" class="nav-link">
            <h4>Sistem Pemetahan Lahan</h4>
          </a></li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="fa fa-sign"></i>
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>


      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Administrator</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('foto') }}/{{ Auth::user()->foto }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="/home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/pemilik_lahan" class="nav-link {{ request()->is('pemilik_lahan') ? 'active' : ''}}">
                <i class="nav-icon fas fa-child"></i>
                <p>Data Pemilik Lahan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/wilayah_desa" class="nav-link {{ request()->is('wilayah_desa') ? 'active' : ''}}">
                <i class="nav-icon fas fa-map-marker"></i>
                <p>Wilayah Desa</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/data_lahan" class="nav-link {{ request()->is('data_lahan') ? 'active' : ''}}">
                <i class="nav-icon fas fa-sitemap"></i>
                <p>Data Lahan</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="/user" class="nav-link {{ request()->is('user') ? 'active' : ''}}">
                <i class="nav-icon fas fa-user"></i>
                <p>User</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/wilayah_banjir" class="nav-link {{ request()->is('wilayah_banjir') ? 'active' : ''}}">
                <i class="nav-icon fas fa-cloud"></i>
                <p>Rawan Banjir</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/prediksi_luas" class="nav-link {{ request()->is('prediksi_luas') ? 'active' : ''}}">
                <i class="nav-icon fas fa-globe"></i>
                <p>Prediksi Luas Lahan</p>
              </a>
            </li>

           
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">{{$title}}</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            @yield('content')
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>

    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <!-- footer bawah-->
    <!--footer class="main-footer"-->
    <!-- To the right -->
    <!--div class="float-right d-none d-sm-inline"-->
    <!--Anything you want-->
    <!--div-->
    <!-- Default to the left -->
    <!--strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io"--><!--AdminLTE.io--><!--</a>.</!--strong> All rights reserved.-->
    <!--/-footer-->

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="{{ asset('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('AdminLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('AdminLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('AdminLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('AdminLTE')}}/dist/js/demo.js"></script>
  <!-- page script -->

<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE')}}/dist/js/demo.js'"></script>





  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      })
    }, 3000)
  </script>

  <!-- date-range-picker -->
  <script src="{{ asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>

 <!-- jQuery -->
 <script src="{{ asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

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

<script src="{{ asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('AdminLTE')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('AdminLTE')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE')}}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE')}}/dist/js/demo.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE')}}/dist/js/adminlte.js"></script>

 


</body>

</html>