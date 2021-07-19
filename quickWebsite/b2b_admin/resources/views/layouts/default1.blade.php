<!doctype html>
<html>

<head>
    @include('includes.header3')
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            @yield('content')
            <footer class="row main-footer">
                @include('includes.footer2')
                @yield('content-js')

            </footer>
        </div>

    </div>
</body>

<!-- <script>
    window.location.href = '{{url(' / ')}}';
</script> -->


</html>