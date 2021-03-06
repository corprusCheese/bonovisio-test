<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include("include.head")
</head>
<body class="antialiased">

@yield('content')

</body>
</html>
