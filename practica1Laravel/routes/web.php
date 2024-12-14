<?php

use App\Http\Middleware\ValidarIdRutas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

//obtener todos los alumnos
Route::get('/obtenerTodosAlumnos', function () {
    return AlumnoController::obtenerTodosAlumnos();
});

//obtener alumno por id con parámetro id
Route::get('/obtenerPorIdAlumno/{id}', function ($id) {
    return AlumnoController::obtenerPorIdAlumno($id);
})->middleware(ValidarIdRutas::class);

//crear alumno ---> no va a funcionar porque no tiene el método static, DUDA: porque arriba me ha dejado utilizar un metodo static en un get pero en un post no me deja
// Route::post('/crearAlumno', function ($alumno) {
//     return AlumnoController::crearAlumno($alumno);
// });
Route::post('/crearAlumno', [AlumnoController::class, 'crearAlumno']);


//certificado csrf para poder tener permisos y hacer
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::delete('/eliminarAlumno/{id}', function ($id) {
    return AlumnoController::eliminarAlumno($id);
})->middleware(ValidarIdRutas::class);

//NO DEJA EJECUTARLO CUANDO TIENE CONTENIDO EN EL BODY DEL POSTMAN
// Route::put('/actualizarAlumno/{id}', function ($id, $alumno) {
//     return AlumnoController::actualizarAlumno($alumno, $id);
// });

Route::put('/actualizarAlumno/{id}', [AlumnoController::class, 'actualizarAlumno'])->middleware(ValidarIdRutas::class);
