<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('css')
    <title>@yield('title')</title>
   
</head>
<body>

<header class="menu">
<ul class="nav">
   <li> <a href="/">View all Movies</a> </li>
   <li> <a href="/create">Create Movie</a> </li>
</ul>
</header>



    <div class="header">
        @yield('header')
    </div>


<div class="container-body">
@yield('content')
</div>

<div class="footer">
@yield('footer')
</div>
</body>
</html>