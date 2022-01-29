<!DOCTYPE html>
<html>
<head>
    <title>{{ $page_title }} - Technical Test</title>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <style>
        .main {
            /* max-width: 800px;
            margin: 0 auto; */
        }

        .header {
            margin: 10px 0;
        }

        .header .title {
            margin: 0 10px 20px 0;
            font-size: 22px;
            font-weight: bold;
        }

        .page-header {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="main">

        @include('layouts.header')

        @yield('content')

    </div>
</body>
</html>
