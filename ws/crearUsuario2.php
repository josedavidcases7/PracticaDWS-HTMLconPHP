<?php

require_once 'AlumnoBD.php';

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
$alumno = $gestionbd->crear($data);

$response = [
    'success' => true,
    'message' => 'Alumno creado',
    'data' => $alumno->toJson(),
];

echo json_encode($response);
