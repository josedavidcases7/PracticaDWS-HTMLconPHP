<?php

require_once "./interfaces/IToJson.php";
class Users implements IToJson {
    public $nombre;
    public $apellidos;
    public $contrasenia;
    public $telefono;
    public $email;
    public $sexo;

    public function __construct($nombre, $apellidos, $contrasenia, $telefono, $email, $sexo   ){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->contrasenia = $contrasenia;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->sexo = $sexo;
    }
    
    //GETTER

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSexo() {
        return $this->sexo;
    }

    // SETTER
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function toJson(){
        return [
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "contrasenia" => $this->contrasenia,
            "telefono" => $this->telefono,
            "email" => $this->email,
            "sexo" => $this->sexo ];
    }
}


