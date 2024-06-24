<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reuben Siama {{ '- '.$title }}</title>
    <meta name="description" content="{{ $description ?? 'Reuben Siama\'s personal website'}}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
</head>
<body class="h-screen bg-black text-white {{ $class ?? ''}}">
    @yield('body')
</body>
</html>
