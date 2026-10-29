<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Empresa;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $empresas = Empresa::all();

        return view('usuarios.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'password' => 'required',
            'rol' => 'required',
            'id_empresa' => 'required'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'password' => bcrypt($request->password),
            'rol' => $request->rol,
            'activo' => $request->activo,
            'fecha_creacion' => date('Y-m-d'),
            'id_empresa' => $request->id_empresa
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente');
    }

    public function edit(Usuario $usuario)
    {
        $empresas = Empresa::all();

        return view('usuarios.edit', compact('usuario', 'empresas'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'rol' => 'required',
            'id_empresa' => 'required'
        ]);

        $usuario->update([
            'nombre' => $request->nombre,
            'rol' => $request->rol,
            'activo' => $request->activo,
            'id_empresa' => $request->id_empresa
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}