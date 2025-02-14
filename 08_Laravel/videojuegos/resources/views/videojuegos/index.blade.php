<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videojuegos</title>
    <style>
        table, th, td {
            border: 1px solid black
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>PEGI</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videojuegos as $videojuego)
                <tr>
                    <td>{{$videojuego -> titulo}}</td>
                    <td>{{$videojuego -> pegi}}</td>
                    <td>{{$videojuego -> genero}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
