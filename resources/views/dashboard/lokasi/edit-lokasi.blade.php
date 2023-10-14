@extends('dashboard/main')
@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Lokasi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form class="" action="{{ route('data-lokasi.update', $data->location_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Desa</label>
                                <input type="text" class="form-control" id="name" name="village"
                                    value="{{ $data->village }}">
                            </div>
                            <div class="form-group">
                                <label for="nidn">Kecamatan</label>
                                <input type="text" class="form-control" id="nidn" name="sub_district"
                                    value="{{ $data->sub_district }}">
                            </div>
                            <div class="form-group">
                                <label for="city">Kota / Kabupaten</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ $data->city }}">
                            </div>
                            <div class="form-group">
                                <label for="full_address">Alamat Lengkap</label>
                                <input type="text" class="form-control h-10" id="full_address" name="full_address"
                                    value="{{ $data->full_address }}" />
                            </div>
                            <div class="container-map">
                                <div id="map">
                                </div>
                            </div>
                            <div class="form-group my-2 ">
                                <label for="coordinate">Penanda / Koordinat (GeoJson) </label>
                                <input type="text" class="form-control h-10" id="coordinate" name="coordinate"
                                    value="{{ $data->coordinate }}" readonly />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary float-right my-2">Simpan</button>
                        </form>


                    </div>


                </div>
            </div>
        </div>

    </div>


    <script>
        var map = L.map('map').setView([-7.836810, 112.019964], 11);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        const input = document.querySelector("#coordinate");
        var coordinate = {!! $data !!};
        var geoJSONData = JSON.parse(coordinate.coordinate);


        input.value = JSON.stringify(geoJSONData);
        // Mengubah marker yang di-parse dari Laravel menjadi circle warna merah
        var geoJSONLayer = L.geoJSON(geoJSONData, {
            pointToLayer: function(feature, latlng) {
                return L.circleMarker(latlng, {
                    radius: 8,
                    fillColor: 'red',
                    color: '#000',
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 0.8
                });
            }
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            position: 'topright',
            draw: {
                polygon: {
                    shapeOptions: {
                        color: 'purple'
                    },
                    allowIntersection: false,
                    drawError: {
                        color: 'orange',
                        timeout: 1000
                    },
                },
                polyline: {
                    shapeOptions: {
                        color: 'grey'
                    },
                },
                rect: {
                    shapeOptions: {
                        color: 'green'
                    },
                },
                circle: false
            },
            edit: {
                featureGroup: drawnItems
            }
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;
            drawnItems.addLayer(layer);
            // Dapatkan koordinat dari layer yang baru dibuat
            // const newMarkerLatLng = e.layer.getLatLng();
            const input = document.querySelector("#coordinate");
            const data = drawnItems.toGeoJSON();
            input.value = JSON.stringify(data);
            // Dapatkan alamat dan perbarui popup dan input value
            // fetchAddress(newMarkerLatLng);
        });
        map.on('draw:edited', async function(e) {
            const input = document.querySelector("#coordinate");

            // Ambil nilai GeoJSON sebelum pengeditan
            const previousGeoJSON = drawnItems.toGeoJSON();

            // Dapatkan nilai GeoJSON baru setelah pengeditan
            const newGeoJSON = drawnItems.toGeoJSON();

            // Update nilai input coordinate
            input.value = JSON.stringify(newGeoJSON);

            // Lakukan sesuatu dengan nilai GeoJSON yang baru, jika diperlukan
            console.log("Previous GeoJSON:", previousGeoJSON);
            console.log("New GeoJSON:", newGeoJSON);
        });
        map.on('draw:editmove', async function(e) {
            const editedLayer = e.layer; // Access the edited layer directly

            if (editedLayer instanceof L.Marker) {
                const editedMarkerLatLng = editedLayer.getLatLng();

                // Dapatkan alamat dan perbarui popup dan input value
                await fetchAddress(editedMarkerLatLng);
            }
            const input = document.querySelector("#coordinate");
            const data = drawnItems.toGeoJSON();
            input.value = JSON.stringify(data);
        });
        async function fetchAddress(coordinates) {
            try {
                const response = await fetch(
                    `https://api.geoapify.com/v1/geocode/reverse?lat=${coordinates.lat}&lon=${coordinates.lng}&apiKey={{ env('GEO_APIFY') }}`
                );
                const result = await response.json();

                if (result.features && result.features.length > 0) {
                    const formattedAddress = result.features[0].properties.formatted;

                    console.log(formattedAddress)
                    // Perbarui isi popup dengan alamat yang ditemukan
                    drawnItems.eachLayer(function(layer) {
                        layer.bindPopup(formattedAddress).openPopup();
                    });

                } else {
                    console.error('No address found for the given coordinates.');
                }
            } catch (error) {
                console.error('Error fetching address:', error);
            }
        }


        map.on('draw:deleted', function(e) {
            const input = document.querySelector("#coordinate");

            // Ambil nilai GeoJSON sebelum penghapusan
            const previousGeoJSON = drawnItems.toGeoJSON();

            // Hapus layer yang dihapus dari feature group
            e.layers.eachLayer(function(layer) {
                drawnItems.removeLayer(layer);
            });

            // Dapatkan nilai GeoJSON baru setelah penghapusan
            const newGeoJSON = drawnItems.toGeoJSON();

            // Update nilai input coordinate
            input.value = JSON.stringify(newGeoJSON.features.length > 0 ? newGeoJSON : geo);

            // Lakukan sesuatu dengan nilai GeoJSON yang baru, jika diperlukan
            console.log("Previous GeoJSON:", previousGeoJSON);
            console.log("New GeoJSON:", newGeoJSON);
        });
    </script>

@endsection
