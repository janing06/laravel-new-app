<x-app-layout>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Update User</h2>
        </div>
    </div>


    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
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
                    <div class="text-end  ">
                        <button type="submit" class="btn btn-gray-800">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Delete User</h2>
        </div>

        <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete"
            aria-hidden="true">
            <div class="modal-dialog modal-white modal-dialog-centered" role="document">
                <div class="modal-content bg-gradient-dark">
                    <button type="button" class="btn-close theme-settings-close fs-6 ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
                            <p>Are you sure you want to delete this user?</p>
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




</x-app-layout>
