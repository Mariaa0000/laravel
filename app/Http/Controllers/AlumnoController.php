<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller
{
    // Reglas de validación para la creación de un nuevo alumno
    private function rulesStore()
    {
        return [
            'nombre' => 'required|string|max:32',
            'password' => 'required|string|min:8|max:64',
            'email' => 'required|email|unique:alumnos,email',
            'edad' => 'nullable|integer|between:16,99',
            'sexo' => 'nullable|in:M,F',
        ];
    }


    public function index() // Listar todos los alumnos
    {
        $alumnos = Alumno::all();
        return response()->json($alumnos);
    }

    public function show($id) // Mostrar un alumno por ID
    {
        $alumno = Alumno::find($id);
        if ($alumno) {
            return response()->json($alumno);
        } else {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }
    }

    public function store(Request $request) // Crear nuevo alumno
    {
        // Validación de los datos
        $validated = $request->validate($this->rulesStore());

        $alumno = Alumno::create([ // Crear el nuevo alumno con los datos validados
            'nombre' => $validated['nombre'],
            'password' => bcrypt($validated['password']),
            'email' => $validated['email'],
            'edad' => $validated['edad'] ?? null,
            'sexo' => $validated['sexo'] ?? null,
        ]);
        return response()->json($alumno, 201);
    }

    public function update(Request $request, $id) // Actualizar alumno
    {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        // Validación de los datos de actualización
        $validated = $request->validate(['nombre' => 'nullable|string|max:32',
            'password' => 'nullable|string|min:8|max:64',
            'email' => 'nullable|email|unique:alumnos,email,'.$id,
            'edad' => 'nullable|integer|between:16,99',
            'sexo' => 'nullable|in:M,F',]
        );
       $alumno -> update($validated);
        return response()->json($alumno);
    }

    public function destroy($id) // Eliminar alumno
    {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        $alumno->delete();
        return response()->json(['message' => 'Alumno eliminado exitosamente']);
    }
}
