<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ url('/css/app.css') }}">

    <title>Book Store</title>
</head>

<body>
    <div id="app">
        <book-index></book-index>
    </div>

    <script src="{{ url('/js/app.js') }}"></script>
</body>

</html>
