<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <title>{{ config('app.name', 'Ubuntu Social') }}</title>

    <!-- Styles -->
    <link href="//final.cybrics.net/static/ubuntu/css/app.css" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @auth
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endauth

    @yield('css')

</head>

<body id="page_top">
    <div id="wrap">
        
        @auth
            @include('layouts.navbar')
        @endauth

        @yield('content')
        
        <div id="pusher"></div>
    </div>

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" integrity="sha256-ABVkpwb9K9PxubvRrHMkk6wmWcIHUE9eBxNZLXYQ84k=" crossorigin="anonymous"></script>
    <script src="//final.cybrics.net/static/ubuntu/js/app.js"></script>
    @yield('scripts')

</body>

</html>
