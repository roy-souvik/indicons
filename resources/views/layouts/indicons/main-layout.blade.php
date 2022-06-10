<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name', 'Indicons') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="indicons/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="indicons/css/styles.css" rel="stylesheet" />
    <link href="indicons/css/style.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('layouts.indicons.header')

    @include('layouts.indicons.navigation')

    <div class="inner-page">

        <div class="container">
            @yield('content')
        </div>

    </div>

    @include('layouts.indicons.scripts')
</body>

</html>
