<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1>Listado de Usuarios</h1>

    <a href="{{ route('usuarios.create') }}"
       class="btn btn-primary mb-3">

       Nuevo Usuario
    </a>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

        @foreach($usuarios as $usuario)

            <tr>

                <td>{{ $usuario->id_usuario }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->rol }}</td>
                <td>{{ $usuario->activo }}</td>

                <td>

                    <a href="{{ route('usuarios.edit',$usuario->id_usuario) }}"
                       class="btn btn-warning">

                       Editar
                    </a>

                    <form action="{{ route('usuarios.destroy',$usuario->id_usuario) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">
                            Eliminar
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>