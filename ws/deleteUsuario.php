<?php

require_once 'AlumnoBD.php';

if (isset($_GET['id'])) {
    $gestionbd = new AlumnoBD();
    $alumno = $gestionbd->eliminarPorId($_GET['id']);

    $response = $alumno ? [
        'success' => true,
        'message' => 'Alumno eliminado',
        'data' => $alumno->toJson(),
    ] : [
        'success' => false,
        'message' => 'Alumno no encontrado',
        'data' => null,
    ];
} else {
    $response = [
        'success' => false,
        'message' => 'ID no proporcionado',
        'data' => null,
    ];
}

echo json_encode($response);
