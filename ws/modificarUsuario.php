<?php

require_once 'AlumnoBD.php';

if (isset($_GET['id'])) {
    $data = [
        'nombre' => $_POST['nombre'] ?? null,
        'apellidos' => $_POST['apellidos'] ?? null,
        'password' => $_POST['password'] ?? null,
        'telefono' => $_POST['telefono'] ?? null,
        'email' => $_POST['email'] ?? null,
        'sexo' => $_POST['sexo'] ?? null,
        'fecha_nacimiento' => $_POST['fecha_nacimiento'] ?? null,
    ];

    $gestionbd = new AlumnoBD();
    $alumno = $gestionbd->modificar($_GET['id'], $data);

    $response = $alumno ? [
        'success' => true,
        'message' => 'Alumno modificado',
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
