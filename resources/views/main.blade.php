<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Cosmos</title>
</head>
<body>
@include('main_parts.nav')
@include('msg.index')
@yield('content')
@include('main_parts.footer')
</body>
</html>