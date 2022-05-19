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
    <div id="app">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="hold-transition login-page" style="background-color:#fff; height:80vh;">
                            <img class="mx-auto text-center mb-5" src="{{ asset('public/images/ahlee.png') }}" style="max-width:200px;">
                            <div class="login-box w-100">
                                <div class="card">
                                    <div class="card-body login-card-body">
                                        <h4 class="login-box-msg mb-3">{{ __('Please fill form below to receive further information about Ahlee Institution from our team
                                            ') }}</h4>
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form method="POST" action="{{ route('request-demo.store') }}">
                                            @csrf
                                            <div class="form-group my-5">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Enter your email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required autofocus>
                                            </div>
                                            <div class="form-group my-5">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" placeholder="Enter your full name" required>
                                            </div>
                                            <div class="form-group my-5">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Enter your phone number" pattern="(08|628)\d{8,13}" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-block rounded-pill text-white py-3" style="background-color:#1566be;">{{ __('Request') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
