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

<div class="main">

    @include('layouts.header')

    @yield('content')

</div>
