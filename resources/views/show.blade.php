<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if($categoryGame)
        <h1>El nombre del videojuego es:{{$nameVideogame}} y la categoria es:{{$categoryGame}}</h1>
    @else
        <h1>El nombre del videojuego es:{{$nameVideogame}}</h1>
    @endif

    {{-- @if ()
    @elseif($condition)
    @else
    @endif --}}

    <h3>{{$fecha}}</h3>
</body>
</html>