<x-app-layout>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Register New User</h2>
        </div>
    </div>


    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="email">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                id="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                    </div>
                    <div class="col-lg-7">
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                id="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                    </div>
                    <div class="col-lg-7">
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="map">Location</label>
                            <input type="hidden" name="latitude"
                                class="form-control @error('latitude') is-invalid @enderror" id="latitude">
                            <input type="hidden" name="longitude" class="form-control" id="longitude">

                            <div id="map" style="height: 400px;"
                                class="rounded @error('latitude') border border-2 border-danger @enderror"></div>
                            @error('email')
                                <div class="invalid-feedback">
                                    The map field is required
                                </div>
                            @enderror

                        </div>
                        <!-- End of Form -->
                    </div>

                    <div class="col-lg-7">
                        <div class="form-group mb-4">
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" id="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- End of Form -->
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                class="form-control @error('password') is-invalid @enderror""
                                id="password_confirmation">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>



                    <div class="">
                        <button type="submit" class="btn btn-gray-800">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <script>
        var map = L.map('map').setView([12.82037128739367, 122.71321088722186], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            draw: {
                marker: true,
                circle: false,
                polyline: false,
                polygon: false,
                rectangle: false
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);

        // var drawControl = new L.Control.Draw({
        //     draw: {
        //         marker: true,
        //         circle: false,
        //         polyline: false,
        //         polygon: false,
        //         rectangle: false
        //     },
        // });

        // map.addControl(drawControl);

        var marker;

        // var drawFeatures = new L.FeatureGroup();
        // map.addLayer(drawFeatures);

        map.on("draw:created", function(e) {
            var type = e.layerType;
            var layer = e.layer;

            // Remove the previous marker
            if (marker) {
                drawnItems.removeLayer(marker);
            }

            // Add the new marker
            marker = layer;

            document.querySelector('#latitude').value = marker._latlng.lat
            document.querySelector('#longitude').value = marker._latlng.lng

            console.log("Marker Latitude:", marker._latlng.lat);
            console.log("Marker Longitude:", marker._latlng.lng);

            drawnItems.addLayer(marker);
        });
    </script>

</x-app-layout>
