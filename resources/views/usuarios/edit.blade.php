<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Editar Usuario</h2>

    <form action="{{ route('usuarios.update',$usuario->id_usuario) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>

            <input type="text"
                   class="form-control"
                   name="nombre"
                   value="{{ $usuario->nombre }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rol</label>

            <select class="form-select" name="rol">

                <option value="Administrador"
                    {{ $usuario->rol == 'Administrador' ? 'selected' : '' }}>
                    Administrador
                </option>

                <option value="Empleado"
                    {{ $usuario->rol == 'Empleado' ? 'selected' : '' }}>
                    Empleado
                </option>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Activo</label>

            <select class="form-select" name="activo">

                <option value="1"
                    {{ $usuario->activo == 1 ? 'selected' : '' }}>
                    Sí
                </option>

                <option value="0"
                    {{ $usuario->activo == 0 ? 'selected' : '' }}>
                    No
                </option>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Empresa</label>

            <select class="form-select" name="id_empresa">

                @foreach($empresas as $empresa)

                <option value="{{ $empresa->id_empresa }}"
                    {{ $usuario->id_empresa == $empresa->id_empresa ? 'selected' : '' }}>

                    {{ $empresa->nombre }}

                </option>

                @endforeach

            </select>

        </div>

        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>

        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </form>

</div>

</body>
</html>