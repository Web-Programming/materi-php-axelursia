<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle') </title>
</head>
<body>
    <!-- ini bagian header -->
    @include('layout.dashboard')
    
    <!-- ini bagian header -->
    @include('layout.header')

    <!-- ini bagian side bar -->
    @include('layout.sidebar')

    <!-- ini bagian Content-->
    @yield('content')

    <!-- ini bagian footer -->
    @include('layout.footer')

</body>
</html>
