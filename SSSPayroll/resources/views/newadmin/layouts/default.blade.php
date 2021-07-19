<!doctype html>
<html>

@if(!empty(Session::get('aid')))

<head>
    @include('newadmin.includes.head')
</head>

<body>
    <div class="main-wrapper">
        @include('newadmin.includes.header')
        @include('newadmin.includes.sidebar')
        <div class="page-wrapper">
            @yield('content')
            <footer class="row main-footer">
                @include('newadmin.includes.footer')
                @yield('content-js')

            </footer>
        </div>

    </div>
</body>
@else
<script>
    window.location.href = '{{url(' / ')}}';
</script>

@endif

</html>