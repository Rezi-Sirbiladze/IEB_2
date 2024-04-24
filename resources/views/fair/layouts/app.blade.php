<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/IEBLogo.jpg') }}">

    <title>@yield('title')</title>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
    <link
        href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css"
        rel="stylesheet">

    <style>
        * {
            /* font-family: "Source Sans 3"; */
        }

        #page-content {
            background-color: white;
            margin-top: 20vh;
            font-size: 2rem;
            padding: 10px;
            position: relative;
        }


        .btn1 {
            background-color: #00a4ae;
            color: white;
            padding: 12px 40px;
            text-decoration: none;
            border-radius: 20px;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            display: inline-block;
            font-size: 1.5rem;
        }

        .btn1:hover {
            background-color: #007d85;
            transform: translateY(-2px);
        }

        .btn1:active {
            transform: translateY(0);
        }

        .btn2 {
            background-color: #00a4ae;
            color: white;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            display: inline-block;
            font-size: 1.5rem;
            width: 100%;
            border-radius: 5px 5px 0px 0px;
        }

        .btn2Pending {
            background-color: #002e35;
            color: white;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            display: inline-block;
            font-size: 1.5rem;
            width: 100%;
            border-radius: 5px 5px 0px 0px;

        }

        .btn2:hover {
            background-color: #007d85;
            transform: translateY(-2px);
        }

        .btn2:active {
            transform: translateY(0);
        }

        .progress {
            border-radius: 0px 0px 5px 5px;
            animation: pulse 1s infinite alternate;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f100;
        }

        ::-webkit-scrollbar-thumb {
            background: #333333;
            border-radius: 5px;
        }
    </style>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('fair.layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <div id="page-content" class="mt-0">
                <div class="container-xxl">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="container-xxl">
                        <div class="mb-2">
                            <h1 class="text-center">@yield('pageTitle')</h1>
                            <p class="card-text mt-3">
                                @yield('pageContent')
                            </p>
                            <div class="text-center mt-3">
                                @if (!Route::currentRouteName() || !Str::startsWith(Route::currentRouteName(), 'admin.'))
                                    <a class="btn1"
                                        href=" {{ Route::currentRouteNamed('fair.index') ? '#schedule' : route('fair.index') }}">RESERVAR</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    @include('fair.layouts.footer')

    <!-- Page Content -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script
        src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js">
    </script>
</body>

</html>
