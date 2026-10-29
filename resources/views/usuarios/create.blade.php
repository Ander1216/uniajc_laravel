<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Crear Usuario</h2>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text"
                   class="form-control"
                   name="nombre"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password"
                   class="form-control"
                   name="password"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rol</label>
            <select class="form-select" name="rol">
                <option value="Administrador">Administrador</option>
                <option value="Empleado">Empleado</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Activo</label>
            <select class="form-select" name="activo">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Empresa</label>

            <select class="form-select" name="id_empresa">
                @foreach($empresas as $empresa)

                    <option value="{{ $empresa->id_empresa }}">
                        {{ $empresa->nombre }}
                    </option>

                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Guardar
        </button>

        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </form>

</div>

</body>
</html>