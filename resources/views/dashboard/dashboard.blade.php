@extends('dashboard/main')
@section('content')
    <div class="right_col" role="main">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pemetaan Kelompok KKN</h2>
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
                                    <li>
                                        <h5>Desa (No. Kelompok)</h5>
                                    </li>

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


    <script>
        var map = L.map('map').setView([-7.836810, 112.019964], 10);
        var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var tmp = {!! $group !!};
        console.log(tmp);

        let arr = [];
        for (let i = 0; i < tmp.length; i++) {
            // console.log(JSON.parse(tmp[0].location.coordinate).features.length)
            for (let j = 0; j < JSON.parse(tmp[i].location.coordinate).features.length; j++) {
                arr.push(JSON.parse(tmp[i].location.coordinate).features[j])
            }

        }


        var geo = {
            "type": "FeatureCollection",
            "features": arr
        }


        const save = document.querySelector("#location");
        // console.log(tmp[0].location.)
        let markers = [];
        let c = []
        // Loop melalui fitur GeoJSON dan tambahkan ke peta dengan warna acak
        geo.features.forEach(function(feature, index) {
            var color = getRandomColor();
            var popupContent = `<li>-------------------------</li>
            <li><h5>Desa: ${tmp[index] ? tmp[index].location.village : tmp[index - 1].location.village}</h5></li>
            <li>No. Kelompok: ${tmp[index] ? tmp[index].group_no : tmp[index - 1].group_no}</li>
            <li>DPL: ${tmp[index]? tmp[index].lecturer.name : tmp[index - 1].lecturer.name }</li>
            <li>Alamat: ${tmp[index] ? tmp[index].location.full_address  : tmp[index - 1].location.full_address}</li>
            
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
            h3.innerText = tmp[index] ? tmp[index].location.village + ` (${tmp[index].group_no})` : tmp[index -
                1].location.village + ` (${tmp[index -1].group_no})`;
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
