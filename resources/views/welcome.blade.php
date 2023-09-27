<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/welcomeStyle.css">
    <title>Laravel</title>
</head>
<body>
    <div id="title">
        <h2>Homepage</h2>
    </div>
    <div id="links">
        <a href="{{route('product.index')}}">Products page</a>
        <a href="{{route('shop.index')}}">Shop page</a>
    </div>
</body>
</html>