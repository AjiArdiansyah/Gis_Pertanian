@extends('layouts.frontend')
@section('content')

<div id="map" style="width:100%; height: 500px;"></div>

<script>
  var peta1 = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
  });

  var peta2 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
  });


  var peta3 = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data &copy; <a href="https://opentopomap.org/">OpenTopoMap</a> contributors'
  });

  var peta4 = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data &copy; <a href="https://carto.com/">Carto</a>'
  });

  var wilayah_desa = L.layerGroup();


  var map = L.map('map',  {
    drawControl: true,
    center: [-7.250043590465663, 111.94933296451791],
    zoom: 17,
    layers: [peta1, wilayah_desa]
  });

  var baseMaps = {
    "Satelite": peta1,
    "Streets": peta2,
    "Grayscale": peta3,
    "Dark": peta4

  };

  var overlayer = {
    "WilayahDesa" : wilayah_desa,
  };

  var layerControl = L.control.layers(baseMaps, overlayer).addTo(map);

  @foreach ($wilayahdesa as $data)
  L.geoJSON(<?= $data->geojson ?>,{
    style : {
      color : 'white',
      fillColor : '{{ $data->warna }}',
      fillOpacity : 1.0,
    },
  }).addTo(wilayah_desa).bindPopup("{{ $data->wilayah_desa }}");
  @endforeach


</script>
@endsection