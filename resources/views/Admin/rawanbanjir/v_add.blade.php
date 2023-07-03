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

            <form action="/wilayah_banjir/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Wilayah Banjir</label>
                            <input type="text" name="wilayah_banjir" class="form-control" placeholder="Wilayah Banjir">
                            <div class="text-danger">
                                @error('wilayah_banjir')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
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
                        <!-- text input -->
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Password">
                            <div class="text-danger">
                                @error('keterangan')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Map</label>
                        <div id="map" style="width:100%; height: 500px;"></div>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css" />
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
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
                            var map = L.map('map', {
                                center: [-7.250043590465663, 111.94933296451791],
                                zoom: 17,
                                layers: [peta1]
                            });



                            var baseMaps = {
                                "Satelite": peta1,
                                "Streets": peta2,
                                "Grayscale": peta3,
                                "Dark": peta4
                            };



                            var layerControl = L.control.layers(baseMaps).addTo(map);

                            var curLocation = [-7.250043590465663, 111.94933296451791];
                            map.attributionControl.setPrefix(false);

                            var drawnItems = new L.FeatureGroup();
                            map.addLayer(drawnItems);
                            var drawControl = new L.Control.Draw({
                                draw: {
                                    polygon: true,
                                    polyline: true,
                                    rectangle: true,
                                    circle: true,
                                    marker: false,
                                    circlemarker: false,
                                },
                                edit: {
                                    featureGroup: drawnItems
                                }
                            });
                            map.addControl(drawControl);

                            // Membuat Draw
                            map.on('draw:created', function(event) {
                                var layer = event.layer;
                                var feature = layer.feature || {};
                                feature.type = "Feature";
                                var props = feature.properties || {};
                                feature.properties = props;
                                drawnItems.addLayer(layer);
                                $("#geojson").html(JSON.stringify(drawnItems.toGeoJSON()));
                            });


                            //edit Draw
                            map.on('draw:edited', function(e) {
                                $("#geojson").html(JSON.stringify(drawnItems.toGeoJSON()));
                            });

                            //Delete Draw
                            map.on('draw:deleted', function(e) {
                                $("#geojson").html("");
                            });

                            map.fitBounds(drawnItems.getBounds());
                        </script>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label>GEOJSON</label>
                    <textarea name="geojson" id="geojson" rows="7" class="form-control" placeholder="Geojson"></textarea>
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
        <a href="/wilayah_banjir" class="btn btn-warning float-right">Cancel</a>
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