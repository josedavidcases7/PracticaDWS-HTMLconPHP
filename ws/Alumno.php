<?php

class Alumno
{
    public $id;
    public $nombre;
    public $apellidos;
    public $password;
    public $telefono;
    public $email;
    public $sexo;
    public $fecha_nacimiento;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? null;
        $this->nombre = $data['nombre'];
        $this->apellidos = $data['apellidos'];
        $this->password = $data['password'];
        $this->telefono = $data['telefono'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->sexo = $data['sexo'] ?? null;
        $this->fecha_nacimiento = $data['fecha_nacimiento'];
    }

    public function toJson()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'password' => $this->password,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'sexo' => $this->sexo,
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ];
    }
}
