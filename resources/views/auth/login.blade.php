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
            <div class="row">
                <div class="col-md-6 col-sm-12 p-0">
                    <div class="hold-transition login-page" style="background-color:#fff; height:80vh;">
                        <img class="mx-auto text-center mb-5" src="{{ asset('public/images/ahlee.png') }}" style="max-width:200px;">
                        <div class="login-box">
                            <div class="card">
                                <div class="card-body login-card-body">
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
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group my-5">
                                          <label for="username">Username</label>
                                          <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" id="username" placeholder="Enter your username" required autofocus>
                                        </div>
                                        <div class="form-group mb-5">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" autocomplete="current-password" required>
                                          @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-block rounded-pill text-white py-3 mb-3" style="background-color:#1566be;">{{ __('Login to Continue') }}</button>
                                                <p>Don’t have an account? <a href="{{ route('request-demo.index') }}">Schedule a Demo</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.login-card-body -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 d-none d-sm-block p-0">
                    <div class="hold-transition login-page" style="background-color:#1566BE;">
                        <h1 class="mb-5 text-white">Welcome to University Dashboard</h1>
                        <img class="mx-auto text-center mb-5" src="{{ asset('public/images/back-to-school.png') }}" style="width:70%;">
                        <p class="text-white">&copy; 2021 Ahlee</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
