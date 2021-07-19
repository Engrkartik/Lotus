<!doctype html>
<html>

<head>
    @include('includes.paymentHead')
</head>

<body>
    <div class="main-wrapper">
      
        <div class="page-wrapper">
            @yield('content')
            <footer class="row main-footer">
                @include('includes.footer')
                @yield('content-js')

            </footer>
        </div>

    </div>
</body>

</html>