<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Army Medical Corps Center & School</title>
        <link rel="shortcut icon" href="{{ asset('logos/watermark.jpeg') }}" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased text-gray-700 bg-gray-50">
    <div id="app"></div>
    <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
