<?php

require_once 'AlumnoDAO.php';

$gestionbd = new AlumnoBD();

if (isset($_GET['id'])) {
    $alumno = $gestionbd->obtenerPorId($_GET['id']);
    $response = $alumno ? [
        'success' => true,
        'message' => 'Alumno encontrado',
        'data' => $alumno->toJson(),
    ] : [
        'success' => false,
        'message' => 'Alumno no encontrado',
        'data' => null,
    ];
} else {
    $alumnos = $gestionbd->obtenerTodos();
    $response = [
        'success' => true,
        'message' => 'Lista de alumnos',
        'data' => array_map(fn($a) => $a->toJson(), $alumnos),
    ];
}

echo json_encode($response);
