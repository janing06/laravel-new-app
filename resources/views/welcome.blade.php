<x-guest-layout>

    <header class="header-global">
        <nav id="navbar-main" aria-label="Primary navigation"
            class="navbar navbar-main navbar-expand-lg navbar-theme-primary pt-4 navbar-dark">
            <div class="container position-relative">
                <div class="navbar-collapse collapse me-auto" id="navbar_global">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="./index.html">
                                    <img src="./assets/img/brand/light.svg" alt="Volt logo">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <a href="#navbar_global" class="fas fa-times" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    title="close" aria-label="Toggle navigation"></a>
                            </div>
                        </div>
                    </div>
                    <h1>
                        <a href="" class=" align-middle fs-3 fw-bolder text-white">LARAVEL</a>
                    </h1>
                </div>

                <div class="d-flex align-items-center ms-auto">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="btn btn-outline-white d-inline-flex align-items-center me-md-3">

                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="btn btn-outline-white d-inline-flex align-items-center me-md-3">

                            Login
                        </a>
                    @endauth

                </div>
            </div>
        </nav>
    </header>

    <main>

        <!-- Hero -->
        <section class="section-header overflow-hidden pt-7 pt-lg-8 pb-9 pb-lg-12 bg-primary text-white">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">

                        <h1 class="fw-bolder">Laravel CRUD</h1>
                        <h2 class="lead fw-normal text-muted mb-5">Open source dashboard powered by Bootstrap 5</h2>
                        <!-- Button Modal -->
                        <div class="d-flex align-items-center justify-content-center mb-5">
                            @auth
                                <a href="{{ route('dashboard') }}"
                                    class="btn btn-secondary d-inline-flex align-items-center me-4">

                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('register') }}"
                                    class="btn btn-secondary d-inline-flex align-items-center me-4">

                                    Sign Up
                                </a>
                            @endauth



                            {{-- <div class="mb-lg-0 mt-1">
                                <a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
                                    data-color-scheme="no-preference: dark; light: light; dark: light;"
                                    data-icon="octicon-star" data-size="large" data-show-count="true"
                                    aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
            <figure class="position-absolute bottom-0 left-0 w-100 d-none d-md-block mb-n2"><svg class="home-pattern"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
                    <path d="M3000,0v185.4H0V0c496.4,115.6,996.4,173.4,1500,173.4S2503.6,115.6,3000,0z"></path>
                </svg></figure>
        </section>

    </main>
</x-guest-layout>
