<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ url('css/pesona.png') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>{{ config('app.name', 'Larvel') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	  <script type="text/javascript" src="js/jquery.js"></script>
	  <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
</head>

<body style="background-image: url(image/loginbackground.png);">
    <div class="container overflow-hidden">
    <div class="row gx-5">
        <div class="col">
            <div class="p-3"></div>
        </div>
        <div class="col">
            <div class="p-3">
            <div class="card" style="margin-top: 250px; margin-left:120px">
                    <div class="card-header logincard">{{ __('Silahkan Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customlogin') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="nip" class="col-md-4 col-form-label text-md-end">{{ __('NIP') }}</label>

                                <div class="col-md-6">
                                    <input id="nip" type="text" class="form-control @error('nip') tidak sesuai @enderror" name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus>

                                    @error('nip')
                                        <!-- <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> -->
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') tidak sesuai @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</body>


<!-- {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
    </div>
</div> --}} -->
