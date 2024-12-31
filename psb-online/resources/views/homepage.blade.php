<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-danger">
            <div class="container">
                <a class="navbar-brand" href="#">
                    PSB Online
                </a>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('login') }}" class="btn btn-outline-light">
                            Login
                        </a>
                        <a href="{{ route('register-show') }}" class="btn btn-outline-dark">
                            Register
                        </a>
                    </div>

                </div>

            </div>
        </nav>
    </header>
    <main>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('image/Banner iGracias (7).png') }}" class="d-block w-100" alt="image1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/Igracias.jpg') }}" class="d-block w-100" alt="image2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/Webbanner - JPA 1 2025  (versi Igracias) - 240723 (1).png') }}"
                        class="d-block w-100" alt="image3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <video width="440" autoplay muted loop>
                        <source src="{{ asset('image/videoplayback.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                </div>
                <div class="col-md-6">
                    <h1>PSB Online</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Libero, odio soluta temporibus, omnis nostrum ad odit ut
                        in debitis laudantium magnam. Esse nobis labore maiores,
                        omnis blanditiis quidem eligendi corporis?</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p class="text-center">Copyright @ 2024 </p>
    </footer>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
