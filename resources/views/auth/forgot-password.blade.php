<x-guest-layout>
    <!-- Section -->
    <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">
            <p class="text-center">
                <a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Back to homepage
                </a>
            </p>
            <div class="row justify-content-center form-bg-image"
                data-background-lg="{{ asset('assets/img/illustrations/signin.svg') }}">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                        <div class="mb-4 mt-md-0">
                            <h1 class="h3">Forgot your password?</h1>

                            <p class="mb-0 small text-start">No problem. Just let us know
                                your
                                email address
                                and we will email you a password reset link that will allow you to choose a new one.
                            </p>
                        </div>
                        <form action="{{ route('password.email') }}" method="POST" class="mt-4">
                            @csrf
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="email">Your Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                            </path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        id="email" autofocus required>

                                </div>
                            </div>
                            <!-- End of Form -->

                            <div class="d-grid">
                                <button type="submit" class="btn btn-gray-800">Email Password Reset Link</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
