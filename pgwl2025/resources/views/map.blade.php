@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>
@endsection


@section('content')
    <div id="map"></div>

    <!-- Modal Create Point-->
    <div class="modal fade" id="CreatePointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('points.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill point name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom_point" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_point" name="geom_point" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-point" class="img-thumbnail"
                                width="300">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" clas="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Modal Create Polylines -->
    <div class="modal fade" id="CreatePolylinesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polylines</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('polylines.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill polyline name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polyline" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polyline" name="geom_polyline" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_polyline" name="image"
                                onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-polyline" class="img-thumbnail"
                                width="300">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Modal Create Polygon -->
    <div class="modal fade" id="CreatePolygonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polygon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('polygon.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill point name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polygon" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polygon" name="geom_polygon" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_polygon" name="image"
                                onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-polygon" class="img-thumbnail"
                                width="300">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/@terraformer/wkt"></script>

    <script>
        var map = L.map('map').setView([-8.219154507534505 , 114.37306488757822], 10);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);



        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
                circle: false,
                marker: true,
                circlemarker: true
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);


            console.log(drawnJSONObject);
            //console.log(objectGeometry);

            if (type === 'polyline') {
                console.log("Create " + type);

                $('#geom_polyline').val(objectGeometry);

                //memunculkan modal create polyline
                $('#CreatePolylinesModal').modal('show');

            } else if (type === 'polygon' || type === 'rectangle') {
                console.log("Create " + type);

                $('#geom_polygon').val(objectGeometry);

                //memunculkan modal create polygon
                $('#CreatePolygonModal').modal('show');

            } else if (type === 'marker') {
                console.log("Create " + type);

                $('#geom_point').val(objectGeometry);

                //memunculkan modal create marker
                $('#CreatePointModal').modal('show');
            } else {
                console.log('__undefined__');
            }

            drawnItems.addLayer(layer);
        });

        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routedelete = "{{ route('points.destroy', ':id') }}";
                routedelete = routedelete.replace(':id', feature.properties.id);

                var routeedit = "{{ route('points.edit', ':id') }}";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent =
                    "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Dibuat pada: " + feature.properties.created_at + "<br>" +
                    "<img src='{{ asset('storage/images') }}/" + feature.properties.image +
                    "' width='250' alt=''><br>" +
                    "<div class='row mt-3'>" +
                    "<div class='col-6 text-end'>" +
                    "<a href='" + routeedit + "' class='btn btn-warning btn-sm'>" +
                    "<i class='fa-solid fa-pen-to-square'></i>" +
                    "</a>" +
                    "</div>" +
                    "<div class='col-6'>" +
                    "<form method='POST' action='" + routedelete +
                    "' onsubmit='return confirm(\"Yakin mau dihapus?\")'>" +
                    "<input type='hidden' name='_token' value='{{ csrf_token() }}'>" +
                    "<input type='hidden' name='_method' value='DELETE'>" +
                    "<button type='submit' class='btn btn-sm btn-danger'>" +
                    "<i class='fa-solid fa-trash'></i>" +
                    "</button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" +
                    "<p class='mt-2'><strong>Dibuat Oleh:</strong> " + feature.properties.user_created + "</p>";


                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent).openPopup();
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        /* GeoJSON Polyline */
        var polyline = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routedelete = "{{ route('polylines.destroy', ':id') }}";
                routedelete = routedelete.replace(':id', feature.properties.id);


                var routeedit = "{{ route('polylines.edit', ':id') }}";
                routeedit = routeedit.replace(':id', feature.properties.id);


                var popupContent =
                    "<div style='max-width: 270px; font-size: 14px;'>" +
                    "<p><strong>Nama:</strong> " + feature.properties.name + "</p>" +
                    "<p><strong>Deskripsi:</strong> " + feature.properties.description + "</p>" +
                    "<p><strong>Panjang:</strong> " + feature.properties.length_km.toFixed(2) + " km</p>" +
                    "<p><strong>Dibuat:</strong> " + feature.properties.created_at + "</p>" +

                    "<div class='text-center mb-2'>" +
                    "<img src='{{ asset('storage/images') }}/" + feature.properties.image +
                    "' width='100%' alt='Gambar'>" +
                    "</div>" +

                    "<div class='row text-center mb-2'>" +
                    "<div class='col-6'>" +
                    "<a href='" + routeedit + "' class='btn btn-warning btn-sm w-100'>" +
                    "<i class='fa-solid fa-pen-to-square'></i>" +
                    "</a>" +
                    "</div>" +
                    "<div class='col-6'>" +
                    "<form method='POST' action='" + routedelete +
                    "' onsubmit='return confirm(\"Yakin mau dihapus?\")'>" +
                    "<input type='hidden' name='_token' value='{{ csrf_token() }}'>" +
                    "<input type='hidden' name='_method' value='DELETE'>" +
                    "<button type='submit' class='btn btn-sm btn-danger w-100'>" +
                    "<i class='fa-solid fa-trash'></i>" +
                    "</button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" +

                    "<p class='mt-2'><strong>Dibuat Oleh:</strong> " + feature.properties.user_created +
                    "</p>" +
                    "</div>";

                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routedelete = "{{ route('polygon.destroy', ':id') }}";
                routedelete = routedelete.replace(':id', feature.properties.id);

                var routeedit = "{{ route('polygon.edit', ':id') }}";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent =
                    "<div style='max-width: 270px; font-size: 14px;'>" +
                    "<p><strong>Nama:</strong> " + feature.properties.name + "</p>" +
                    "<p><strong>Deskripsi:</strong> " + feature.properties.description + "</p>" +
                    "<p><strong>Luas:</strong> " + feature.properties.luas_hektar.toFixed(2) + " hektar</p>" +
                    "<p><strong>Dibuat:</strong> " + feature.properties.created_at + "</p>" +

                    "<div class='text-center mb-2'>" +
                    "<img src='{{ asset('storage/images') }}/" + feature.properties.image +
                    "' width='100%' alt='Gambar'>" +
                    "</div>" +

                    "<div class='row text-center mb-2'>" +
                    "<div class='col-6'>" +
                    "<a href='" + routeedit + "' class='btn btn-warning btn-sm w-100'>" +
                    "<i class='fa-solid fa-pen-to-square'></i>" +
                    "</a>" +
                    "</div>" +
                    "<div class='col-6'>" +
                    "<form method='POST' action='" + routedelete +
                    "' onsubmit='return confirm(\"Yakin mau dihapus?\")'>" +
                    "<input type='hidden' name='_token' value='{{ csrf_token() }}'>" +
                    "<input type='hidden' name='_method' value='DELETE'>" +
                    "<button type='submit' class='btn btn-sm btn-danger w-100'>" +
                    "<i class='fa-solid fa-trash'></i>" +
                    "</button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" +

                    "<p class='mt-2'><strong>Dibuat Oleh:</strong> " + feature.properties.user_created +
                    "</p>" +
                    "</div>";

                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygon') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });
    </script>
@endsection
