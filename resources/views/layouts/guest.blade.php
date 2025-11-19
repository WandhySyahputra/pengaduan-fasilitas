<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LaporDesa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya dasar yang dibutuhkan oleh halaman tamu */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-image: url("{{ asset('img/beranda.jpeg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
    @stack('styles')
</head>
<body>
    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')
    @stack('scripts')

</body>
</html>
