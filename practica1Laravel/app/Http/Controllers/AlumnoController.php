<?php


namespace App\Http\Controllers;

use App\Models\Alumno;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public static function obtenerTodosAlumnos()
    {
        $alumnos = Alumno::all();
        return response()->json($alumnos, 200);
    }

    public static function obtenerPorIdAlumno($id)
    {
        $alumno = Alumno::find($id);
        if ($alumno != null) {
            //200 es un okey
            return response()->json($alumno, 200);
        } else {
            // 404 no encontrado
            return response()->json(["message" => "Alumno no encontrado"], 404);
        }
    }
    public static function crearAlumno(Request $alumno)
    {
        $validated = $alumno->validate([
            'nombre' => 'required|string|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'password' => 'required|string|max:64',
            'email' => 'required|email|unique:alumno,email|max:64',
            'sexo' => 'required|string',
        ]);

        $alumno = Alumno::create([
            'nombre' => $validated['nombre'],
            'telefono' => $validated['telefono'],
            'edad' => $validated['edad'],
            'password' => ($validated['password']),
            'email' => $validated['email'],
            'sexo' => $validated['sexo'],
        ]);

        //201 es okey creado
        return response()->json($alumno, 201);
    }

    public static function eliminarAlumno($id)
    {
        $alumno = Alumno::find($id);


        if (!$alumno) {
            return response()->json(["message" => "Alumno no encontrado"], 404);
        }

        $alumno->delete();

        return response()->json(["message" => "Alumno eliminado exitosamente"], 200);
    }
    public static function actualizarAlumno(Request $alumno, $id)
    {
        $validated = $alumno->validate([
            'nombre' => 'required|string|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'password' => 'required|string|max:64',
            'email' => 'required|email|unique:alumno,email,' . $id . '|max:64', // comprueba que el email y el id sean únicos para poder modificarlos
            'sexo' => 'required|string',
        ]);


        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json(["message" => "Alumno no encontrado"], 404);
        }


        $alumno->update($validated);

        // Devolver el alumno actualizado
        return response()->json($alumno, 200);
    }
}
