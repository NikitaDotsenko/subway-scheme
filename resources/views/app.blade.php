<!DOCTYPE html>
<html lang="RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="https://unpkg.com/konva@3.2.6/konva.min.js"></script>

    <script src="{{ mix('/js/app.js') }}" defer></script>

    <title>Subway</title>
</head>
<body>
@routes
@inertia

</body>
</html>
