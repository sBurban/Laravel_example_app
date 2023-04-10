<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Vista creada en blade y llamada desde el controlador.</h1>

    <p><a href="{{ route('gamescreate') }}"> Agregar Videojuego </a></p>

    <h2>Listado de juegos: </h2>
    {{-- @foreach($games as $item)
        {{$item}}
    @endforeach --}}

    {{-- @forelse($games as $item)
        <li>{{$item}}</li>
    @empty
        <li>No hay datos</li>
    @endforelse --}}

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CATEGORIA ID</th>
                <th>CREADO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse($games as $game)
                <tr>
                    <th>{{$game->id}}</th>
                    <th><a href="{{route('viewGame',$game->id)}}">{{$game->name}}</a></th>
                    <th>{{$game->category_id}}</th>
                    <th>{{$game->created_at}}</th>

                    @if($game->active)
                        <th style="color:green;">Activo</th>
                    @else
                        <th style="color:red;">Inactivo</th>
                    @endif
                    <th><a href="{{route('deleteGame',$game->id)}}">Eliminar</a></th>
                </tr>
            @empty
                <tr>
                    <th>Sin videojuegos</th>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>