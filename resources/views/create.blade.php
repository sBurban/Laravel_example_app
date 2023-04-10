<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de creación de videojuegos</h1>

    <p><a href="{{ route('games') }}"> Lista de Videojuegos </a></p>

    <form action="{{ route('createVideogame') }}" method="POST">
        @csrf

        <input type="text" placeholder="Nombre del videojuego" name="name">
        @error('name')
            {{$message}}
        @enderror
        <select name="category_id" id="">
            @foreach($categorias as $categoria)
                <option value={{ $categoria->id }}>{{ $categoria->name }}</option>
            @endforeach
            {{-- <option value="deportes">Deportes</option>
            <option value="accion">Accion</option> --}}
        </select>
        <input type="submit" value="Envíar">
    </form>
</body>
</html>