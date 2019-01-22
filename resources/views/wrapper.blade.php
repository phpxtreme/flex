<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flex</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/0.png') }}"/>
    @yield('stylesheet')
</head>
<body>
    @yield('content')
    @yield('javascript')
</body>
</html>