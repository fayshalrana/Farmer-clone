<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" id="viewport-meta">
    <title>Web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fayshalrana.github.io/Farmer-clone/public/assets/css/style.css">
    @yield('styles')
</head>

<body>
    @include('ui.components.header')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="main_container">

                <div class="content_container w-100">
                    @yield('content')
                </div>
                @include('ui.components.footer')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://fayshalrana.github.io/Farmer-clone/public/assets/lib/gsap/gsap.min.js">
    </script>
    <script type="text/javascript"
        src="https://fayshalrana.github.io/Farmer-clone/public/assets/lib/gsap/ScrollSmoother.min.js"></script>
    <script type="text/javascript"
        src="https://fayshalrana.github.io/Farmer-clone/public/assets/lib/gsap/ScrollTrigger.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script> --}}
    <script src="https://fayshalrana.github.io/Farmer-clone/public/assets/js/common.js"></script>
    @yield('scripts')
</body>

</html>