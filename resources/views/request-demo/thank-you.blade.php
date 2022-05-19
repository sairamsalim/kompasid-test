<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Ahlee Institution') }}</title>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js" rel="stylesheet"
        type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 text-center h-100 d-flex align-items-center justify-content-center">
                            <div><img class="img-fluid d-block mb-5 mx-auto"
                                    src="{{ asset('public/images/ahlee.png') }}" alt="">
                                <h2>REGISTRASI BERHASIL</h2>
                                <h6 class="text-theme">Anda akan segera dihubungi oleh pihak representatif dari kami
                                </h6>
                                <p>Silakan klik <a target="_blank" href="https://institution.ahlee.id">link</a> berikut untuk
                                    kembali ke website.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--coming soon end-->

        </div>

        <!--body content end-->

    </main>

    <script>
        $(function () {
            var count = 5;
            var countdown = setInterval(function () {
                $("#countdown").html(count);
                if (count == 0) {
                    clearInterval(countdown);
                    window.open('https://institution.ahlee.id/login', "_self");

                }
                count--;
            }, 1000);
        });
    </script>

</body>

</html>
