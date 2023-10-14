<!-- jQuery -->
<script src={{ URL::asset('guetella/assets/vendors/jquery/dist/jquery.min.js') }}></script>
<!-- Bootstrap -->
<script src={{ URL::asset('guetella/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}></script>
{{-- Datatables --}}
<script src={{ URL::asset('guetella/assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}>
</script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}>
</script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}>
</script>
<script src={{ URL::asset('guetella/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/jszip/dist/jszip.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/pdfmake/build/pdfmake.min.js') }}></script>
<script src={{ URL::asset('guetella/assets/vendors/pdfmake/build/vfs_fonts.js') }}></script>

<!-- Custom Theme Scripts -->
<script src={{ URL::asset('guetella/assets/js/custom.min.js') }}></script>

{{-- <script>
    //     const el = document.querySelector("#location");
    //     const address = document.querySelector('#address');
    //     var map = L.map('map').setView([-7.836810, 112.019964], 12);
    //     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //         maxZoom: 19,
    //         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    //     }).addTo(map);


    //     var popup = L.popup();

    //     let a = "aaaaa"
    //     // custom popup image + text
    //     const customPopup = `<div class="customPopup">
    //     <ul class="tabs-example" data-tabs>
    //       <li><a data-tabby-default href="#sukiennice">Sukiennice</a></li>
    //       <li><a href="#town-hall-tower">Town Hall Tower</a></li>
    //     </ul>
    //     <div id="sukiennice">
    //         <figcaption>Source: suki</figcaption>
    //     <div>i${a}</div>
    //     </div>
    //     <div id="town-hall-tower">

    //       <figcaption>Source: wikipedia.org</figcaption>
    //       <div>Town Hall Tower in Kraków, Poland</div>
    //     </div>
    //   </div>`;
    //     // specify popup options
    //     const customOptions = {
    //         minWidth: "220", // set max-width
    //         height: "200",
    //         keepInView: true, // Set it to true if you want to prevent users from panning the popup off of the screen while it is open.
    //     };



    //     let marker = null; // Variabel untuk menyimpan marker saat ini

    //     function onMapClick(e) {
    //         // Hapus marker sebelumnya jika ada
    //         if (marker) {
    //             map.removeLayer(marker);
    //         }

    //         // Buat marker dengan koordinat awal
    //         marker = L.marker(e.latlng, {
    //             draggable: true
    //         }).on("click", () => {
    //             // Dapatkan koordinat marker saat diklik
    //             const latLng = marker.getLatLng();
    //             el.value = `${latLng.lat} , ${latLng.lng}`;

    //             // Dapatkan alamat dan perbarui popup dan input value
    //             // fetchAddress(latLng);
    //         }).addTo(map);

    //         // Perbarui popup dengan koordinat awal
    //         marker.bindPopup('Koordinat: ' + e.latlng.lat + ', ' + e.latlng.lng, customOptions);

    //         // Dapatkan koordinat marker dan perbarui input value
    //         const latLng = marker.getLatLng();
    //         el.value = `${latLng.lat} , ${latLng.lng}`;

    //         // Dapatkan alamat dan perbarui input value
    //         fetchAddress(latLng);

    //         marker.on('dragend', (e) => {
    //             // Dapatkan koordinat marker yang baru setelah di-drag
    //             const newMarkerLatLng = marker.getLatLng();
    //             el.value = `${newMarkerLatLng.lat} , ${newMarkerLatLng.lng}`;

    //             // Dapatkan alamat dan perbarui popup dan input value
    //             fetchAddress(newMarkerLatLng);
    //         });
    //     }

    //     map.on('click', onMapClick);

    //     async function fetchAddress(coordinates) {
    //         try {
    //             const response = await fetch(
    //                 `https://api.geoapify.com/v1/geocode/reverse?lat=${coordinates.lat}&lon=${coordinates.lng}&apiKey=bf189eb3f4d84f698623fe6803824403`,
    //                 requestOptions
    //             );
    //             const result = await response.json();
    //             const formattedAddress = result.features[0].properties.formatted;

    //             // Perbarui isi popup dengan alamat yang ditemukan
    //             marker.setPopupContent(formattedAddress);

    //             // Perbarui alamat di elemen input
    //             address.value = formattedAddress;
    //         } catch (error) {
    //             console.log('error', error);
    //         }
    //     }


    //     var requestOptions = {
    //         method: 'GET',
    //     };

    //     function runTabs() {
    //         const tabs = new Tabby("[data-tabs]");
    //     }
</script>

<script>
    var map = L.map('map').setView([-7.836810, 112.019964], 12);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
        // position: 'topright',
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
            circle: {
                shapeOptions: {
                    color: 'steelblue'
                },
            },
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
    });
    // save geojson to localstorage
    const saveJSON = document.querySelector(".save");

    saveJSON.addEventListener("click", (e) => {
        e.preventDefault();
        const data = drawnItems.toGeoJSON();
        localStorage.setItem("geojson", JSON.stringify(data));
    });
</script> --}}
