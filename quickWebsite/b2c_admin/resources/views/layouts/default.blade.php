<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body class="crm_body_bg">
        @include('includes.sidebar')
       
           
            @include('includes.menu')
            @yield('content')
            @include('includes.footer')
         <!-- @yield('content-js') -->
       
</body>
</html>