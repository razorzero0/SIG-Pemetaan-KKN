@extends('dashboard/main')
@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Lokasi KKN</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="{{ route('data-lokasi.create') }}" class="btn btn-primary w-25 h-50 mt-4 mx-4">
                        Tambah Lokasi
                    </a>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Kota</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data as $location)
                                    <tr>
                                        <td>{{ $no += 1 }}</td>
                                        <td>{{ $location->village }}</td>
                                        <td>{{ $location->sub_district }}</td>
                                        <td>{{ $location->city }}</td>
                                        <td>{{ $location->full_address }}</td>
                                        {{-- <td>{{ $location->coordinate }}</td> --}}

                                        <td style="display: flex;gap:5px;" class="my-5">

                                            <form style="display:flex;"
                                                action="{{ route('data-lokasi.destroy', $location->location_id) }} "
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('data-lokasi.edit', $location->location_id) }}"
                                                    class="btn btn-success btn-xs"><i class="fa fa-edit "></i> edit</a>
                                                <button type="submit" class="btn btn-danger btn-xs"
                                                    onclick="return confirm('apakah yakin untuk menghapus data ?')"><i
                                                        class="fa fa-trash"></i> hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pemetaan Lokasi</h2>
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
                        <div class="container-map">
                            <div class="sidebar-map">
                                <ul id="list">
                                    <li>Nama Desa</li>
                                </ul>
                            </div>
                            <div id="map">
                            </div>
                        </div>
                    </div>

                </div>
                <br />
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="instansi">Nama User</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="kepada">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="kepada">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group ">
                            <label for="nama">Password</label>
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group ">
                            <label for="nama">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih role</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                <option value="0">Member</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary col-12">Send</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- modal --}}


    <script>
        var map = L.map('map').setView([-7.836810, 112.019964], 11);
        var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var tmp = {!! $data !!};
        let arr = [];
        for (let i = 0; i < tmp.length; i++) {
            console.log(JSON.parse(tmp[0].coordinate).features.length)
            for (let j = 0; j < JSON.parse(tmp[i].coordinate).features.length; j++) {
                arr.push(JSON.parse(tmp[i].coordinate).features[j])
            }

        }
        var geo = {
            "type": "FeatureCollection",
            "features": arr
        }
        console.log(tmp)
        const save = document.querySelector("#location");

        let markers = [];
        let c = []
        // Loop melalui fitur GeoJSON dan tambahkan ke peta dengan warna acak
        geo.features.forEach(function(feature, index) {
            var color = getRandomColor();
            var popupContent = `<li> ${tmp[index]? tmp[index].full_address : tmp[index -1].full_address}</li>

        `;

            var marker = L.geoJSON(feature, {
                style: function(feature) {
                    c.push(color)
                    return {
                        fillColor: color,
                        color: 'black',
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 0.8
                    };
                },
                pointToLayer: function(feature, latlng) {
                    return L.circleMarker(latlng, {
                        radius: 8,
                        fillColor: color,
                        color: 'black',
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 0.8
                    });
                }
            }).bindPopup(popupContent);

            marker.addTo(map);
            markers.push(marker);
        });

        var list = document.querySelector('#list');

        function handleItemClick(index) {
            var feature = geo.features[index];
            var geometry = feature.geometry;

            // Zoom to the clicked feature
            if (geometry.type === 'Point') {
                map.flyTo(geometry.coordinates.slice().reverse(), 15, {
                    duration: 1.5, // Adjust the duration as needed
                    animate: true
                });
            } else if (geometry.type === 'Polygon') {
                var polygon = L.geoJSON(feature);
                map.flyToBounds(polygon.getBounds(), {
                    duration: 1.5, // Adjust the duration as needed
                    animate: true,
                    maxZoom: 14 // Set the maximum zoom level for polygons
                });
            } else if (geometry.type === 'LineString') {
                var polyline = L.geoJSON(feature);
                map.flyToBounds(polyline.getBounds(), {
                    duration: 1.5, // Adjust the duration as needed
                    animate: true
                });
            }
        }

        markers.forEach(function(marker, index) {
            var color = c[index];
            var newItem = document.createElement('li');
            var h3 = document.createElement('h5');
            var dot = document.createElement('span');
            dot.style.backgroundColor = color;
            newItem.appendChild(dot);
            newItem.appendChild(h3);
            h3.innerText = tmp[index] ? tmp[index].village : tmp[index - 1].village;
            newItem.addEventListener('click', function() {
                handleItemClick(index);
            });

            // marker.on('click', function(e) {
            //     handleItemClick(index);
            // });

            list.appendChild(newItem);
        });





        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
@endsection
