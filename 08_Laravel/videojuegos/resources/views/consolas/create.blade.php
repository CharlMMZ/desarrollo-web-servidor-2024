<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>document</title>
</head>
<body>
    <form action="{{ route('consolas.store')}}" method="post">
        @csrf
        <label>Nombre: </label>
        <input type="text" name="nombre"><br><br>
        <label>Año de lanzamiento: </label>
        <input type="number" name="ano_lanzamiento" id=""><br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>