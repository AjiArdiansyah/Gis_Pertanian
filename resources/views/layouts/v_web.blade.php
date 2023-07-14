@extends('layouts.frontend')
@section('content')

<div id="map" style="width:100%; height: 500px;"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script src="https://unpkg.com/wicket/wicket.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
  var data_lahan = L.layerGroup();


  var map = L.map('map', {
    drawControl: true,
    center: [-7.250043590465663, 111.94933296451791],
    zoom: 17,
    layers: [peta1, wilayah_desa, data_lahan]
  });

  var baseMaps = {
    "Satelite": peta1,
    "Streets": peta2,
    "Grayscale": peta3,
    "Dark": peta4
  };

  var overlayer = {
    "WilayahDesa": wilayah_desa,
    "DataLahan": data_lahan,

  };

  $(document).ready(function() {
    console.log("tes");

    $.ajax({
      url: '/get-datalahan/',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var datalahan = data;
        var wkt = [];
        var wktObj = [];
        var temp = [];
        var detail = '';


        $.each(datalahan, function(i, d) {
          var gjson = d['geojson'];

          var geojson = JSON.parse(gjson);

          var polygonLayer = L.geoJSON(geojson, {
          onEachFeature: function(feature, layer) {
          var namaLabel = d['nama_lahan'];
          layer.bindPopup(namaLabel);
        }
      }).addTo(data_lahan);

        });
      }
    });
  });


  $(document).ready(function() {
    console.log("tes");

    $.ajax({
      url: '/get-wilayahdesa/',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var datawilayahdesa = data;
        var wkt = [];
        var wktObj = [];
        var temp = [];
        var detail = '';


        $.each(datawilayahdesa, function(i, d) {
          var gjson = d['geojson'];

          console.log('tes');
          console.log(gjson);

          var geojson = JSON.parse(gjson);

          var polygonLayer = L.geoJSON(geojson, {
        style: function(feature) {
          return {
            fillColor: d['warna'],
            color: 'white',
            weight: 2,
            opacity: 0.1,
            fillOpacity: 0.4
          };
        },
        onEachFeature: function(feature, layer) {
          var namaLabel = d['wilayah_desa'];
          layer.bindPopup(namaLabel);
        }
      }).addTo(wilayah_desa);

        });
      }
    });
  });

  var layerControl = L.control.layers(baseMaps, overlayer).addTo(map);
  L.control.layers(baseMaps).addTop(map);

 
</script>

@endsection