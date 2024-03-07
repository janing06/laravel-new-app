<x-app-layout>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Update User</h2>
        </div>
    </div>

    <form action="{{ route('users.update', $user) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="card border-0 shadow mb-4">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-7">
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="email">Name</label>

                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                id="name" value="{{ $user->name }}">
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
                                id="email" value="{{ $user->email }}">
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
                            <input type="hidden" name="latitude" class="form-control" id="latitude"
                                value="{{ $user->latitude }}">
                            <input type="hidden" name="longitude" class="form-control" id="longitude"
                                value="{{ $user->longitude }}">

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

                </div>
            </div>
        </div>

        <div class="card border-0 shadow mb-4">

            <div class="card-body">

                <div class="col-lg-7">
                    <div class="form-group mb-4">
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password">Change Password</label>
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
                            class="form-control @error('password') is-invalid @enderror"" id="password_confirmation">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="text-end  ">
                    <button type="submit" class="btn btn-gray-800">Update</button>
                </div>

            </div>
        </div>
    </form>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Delete User</h2>
        </div>

        <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete"
            aria-hidden="true">
            <div class="modal-dialog modal-white modal-dialog-centered" role="document">
                <div class="modal-content bg-gradient-dark">
                    <button type="button" class="btn-close theme-settings-close fs-6 ms-auto bg-danger"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-header">
                        {{-- <p class="modal-title text-gray-200" id="modal-title-notification">A new experience,
                            personalized for you.</p> --}}
                    </div>
                    <div class="modal-body text-dark">
                        <div class="py-3 text-center">
                            <span class="modal-icon">
                                <i class="fa-solid fa-circle-exclamation" style="font-size: 80px;color:red"></i>
                            </span>
                            <h2 class="h4 modal-title my-3">Delete User</h2>
                            @if (auth()->user()->id == $user->id)
                                <p>Are you sure you want to delete this user? You are currently logged in to this user.
                                    It will automatically logout.</p>
                            @else
                                <p>Are you sure you want to delete this user?</p>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Confirm</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mb-4">

        <div class="card-body">
            <div class="card-title">
                Do you want to delete this user?
            </div>

            <div class="text-end">
                <a type="button" class="btn btn-block btn-danger mb-3" data-bs-toggle="modal"
                    data-bs-target="#modal-delete">Delete</a>
            </div>


        </div>
    </div>

    <script>
        var userLocation = [`{{ $user->latitude }}`, `{{ $user->longitude }}`]

        var map = L.map('map').setView([12.82037128739367, 122.71321088722186], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker(userLocation).bindPopup(`{{ $user->latitude }}, {{ $user->longitude }}`);

        var drawnItems = new L.FeatureGroup().addLayer(marker);
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

            drawnItems.addLayer(marker);
        });

        map.on("draw:deleted", function(e) {
            document.querySelector('#latitude').value = ''
            document.querySelector('#longitude').value = ''
        })

        // var map = L.map('map').setView([12.82037128739367, 122.71321088722186], 5);

        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '© OpenStreetMap contributors'
        // }).addTo(map);

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

        // var marker = L.marker(userLocation).bindPopup(`{{ $user->latitude }}, {{ $user->longitude }}`);

        // var drawFeatures = new L.FeatureGroup().addLayer(marker);
        // map.addLayer(drawFeatures);

        // map.on("draw:created", function(e) {
        //     var type = e.layerType;
        //     var layer = e.layer;

        //     // Remove the previous marker
        //     if (marker) {
        //         drawFeatures.removeLayer(marker);
        //     }

        //     // Add the new marker
        //     marker = layer;

        //     document.querySelector('#latitude').value = marker._latlng.lat
        //     document.querySelector('#longitude').value = marker._latlng.lng

        //     console.log("Marker Latitude:", marker._latlng.lat);
        //     console.log("Marker Longitude:", marker._latlng.lng);

        //     drawFeatures.addLayer(marker);
        // });
    </script>
</x-app-layout>
