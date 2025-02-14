<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>
    <style>
        li {
            list-style: none;
        }
    </style>
</head>
<body>
    <h1>Lista de Consolas</h1>
    <ul>
        @foreach ($consolas as $consola)
            <li>{{$consola -> nombre}} {{$consola -> ano_lanzamiento}}</li>
            
        @endforeach
    </ul>
</body>
</html>