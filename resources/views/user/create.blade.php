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
                            <input type="text" name="name"
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
                            <input type="email" name="email"
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
                            <label for="location">Location</label>
                            <input type="text" name="location"
                                class="form-control @error('location') is-invalid @enderror" id="location">

                            <div id="map" style="height: 400px;" class="rounded"></div>

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
        var map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var drawControl = new L.Control.Draw({
            draw: {
                marker: true,
                circle: false,
                polyline: false,
                polygon: false,
                rectangle: false
            },
        });

        map.addControl(drawControl);

        var marker;

        var drawFeatures = new L.FeatureGroup();
        map.addLayer(drawFeatures);

        map.on("draw:created", function(e) {
            var type = e.layerType;
            var layer = e.layer;

            // Remove the previous marker
            if (marker) {
                drawFeatures.removeLayer(marker);
            }

            // Add the new marker
            marker = layer;

            document.querySelector('#location').value = [marker._latlng.lat, marker._latlng.lng]

            console.log("Marker Latitude:", marker._latlng.lat);
            console.log("Marker Longitude:", marker._latlng.lng);

            drawFeatures.addLayer(marker);
        });
    </script>

</x-app-layout>
