<?php
require_once './models/Users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $contrasenia = $_POST['contrasenia'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $email = $_POST['email'] ?? '';
    $sexo = $_POST['sexo'] ?? '';

    $usuario = new Users($nombre, $apellidos, $contrasenia, $telefono, $email, $sexo);

    $guardar = $nombre . ', ' . $apellidos . ', ' . $contrasenia . ', ' . $telefono . ', ' . $email . ', ' . $sexo . PHP_EOL;

    file_put_contents('usuarios.txt', $guardar, FILE_APPEND);

    echo "Nombre: " . $usuario->getNombre();
    echo "Apellidos: " . $usuario->getApellidos();
    echo "Contraseña: " . $usuario->getContrasenia();
    echo "Teléfono: " . $usuario->getTelefono();
    echo "Email: " . $usuario->getEmail();
    echo "Sexo: " . $usuario->getSexo();
} else {
    echo "Error, no se puede enviar";
}
