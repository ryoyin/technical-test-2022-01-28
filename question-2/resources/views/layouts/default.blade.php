<!DOCTYPE html>
<html>
<head>
    <title>{{ $page_title }} - Technical Test</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

        #overlay {
            position: fixed; /* Sit on top of the page content */
            /* display: none; */
            width: 100%; /* Full width (cover the whole page) */
            height: 100%; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5); /* Black background with opacity */
            z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer; /* Add a pointer on hover */
        }

        #loading {
            margin: 30% 50% 70%;
            border: 2px solid #000;
            display: inline-block;
            padding: 20px 30px;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="main">

        @include('layouts.header')

        @yield('content')

    </div>

    <div id="overlay">
        <div id="loading" nowarp>LOADING...</div>
    </div>
</body>
</html>
