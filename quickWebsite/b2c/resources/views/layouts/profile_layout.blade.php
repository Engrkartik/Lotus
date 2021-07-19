<!doctype html>
<html>

<head>
    @include('includes.profile_head')
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