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

            <form action="/data_lahan/update/{{ $datalahan->id_datalahan}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama Lahan</label>
                            <input type="text" value="{{ $datalahan->nama_lahan}}" name="nama_lahan" class="form-control" placeholder="Nama Lahan">
                            <div class="text-danger">
                                @error('nama_lahan')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Pemilik</label>
                            <select name="id_pemiliklahan" class="form-control">
                                <option value="{{ $datalahan->id_pemiliklahan}}">{{ $datalahan->nama_pemilik}}</option>
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
                        <!-- text input -->
                        <div class="form-group">
                            <label>Luas</label>
                            <input type="text" value="{{ $datalahan->luas}}" name="luas" class="form-control" placeholder="Luas">
                            <div class="text-danger">
                                @error('luas')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control" accept="image/jpeg,image/png">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="text-danger">
                            @error('gambar')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label>GEOJSON</label>
                    <textarea name="geojson" id="geojson" rows="7" class="form-control" placeholder="Geojson">{{ $datalahan->geojson}}</textarea>
                </div>

                <div class="col-sm-12">
                    <label>Map</label>
                    <div id="map" value="{{ $datalahan->geojson}}" style="width:100%; height: 500px;"></div>
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

                        var drawnItems = L.featureGroup().addTo(map);
                        map.addLayer(drawnItems);

                        var drawControl = new L.Control.Draw({
                            draw: {
                                polygon: true,
                                polyline: true,
                                rectangle: true,
                                circle: true,
                                marker: false,
                                circlemarker: false

                            },
                            edit: {
                                featureGroup: drawnItems
                            }
                        });

                        map.addControl(drawControl);


                        // Membuat Draw
                        // Tangani kejadian draw:created
                        map.on('draw:created', function(event) {
                            var layer = event.layer;
                            drawnItems.addLayer(layer);
                        });

                       

                        // Mendapatkan data geojson saat halaman dimuat
                        var initialGeojsonData = $('#geojson').val();
                        var initialData = JSON.parse(initialGeojsonData);
                        L.geoJSON(initialData).addTo(drawnItems);

                        // Tangani kejadian draw:edited
                        map.on('draw:edited', function(event) {


                            var layers = event.layers;
                            layers.eachLayer(function(layer) {
                                $('#geojson').val('');
                                
                                $('#geojson').empty();
                                drawnItems.clearLayers();
                                drawnItems.addLayer(layer);

                                // Lakukan sesuatu setelah fitur diedit
                                console.log('Fitur diedit:', layer);

                                // Dapatkan data geojson yang diperbarui
                                var updatedGeojsonData = drawnItems.toGeoJSON();

                                // Perbarui nilai geojson pada textarea
                                $('#geojson').val(JSON.stringify(updatedGeojsonData));

                            });
                            
                        });

                        // Tangani kejadian draw:deleted
                        map.on('draw:deleted', function(event) {
                            var layers = event.layers;
                            layers.eachLayer(function(layer) {

                                // Lakukan sesuatu setelah fitur dihapus
                                console.log('Fitur dihapus:', layer);


                                // Dapatkan data geojson yang diperbarui setelah penghapusan
                                var updatedGeojsonData = drawnItems.toGeoJSON();

                                // Perbarui nilai geojson pada textarea
                                $('#geojson').val(JSON.stringify(updatedGeojsonData));
                                drawnItems.clearLayers();
                            });
                        });

                      

                        function clearTextBox() {
                            $('#geojson').val('');
                            drawnItems.clearLayers();
                        }
                        map.fitBounds(drawnItems.getBounds());

                  
                    </script>
                </div>
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