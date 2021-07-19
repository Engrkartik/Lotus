<!doctype html>
<html>

<head>
    @include('includes.headmain')
</head>

<body>
   
        @include('includes.menumain')
            @include('includes.sidebarmain')
            @yield('content')
            @include('includes.footermain')
         <!-- @yield('content-js') -->
       
</body>
</html>