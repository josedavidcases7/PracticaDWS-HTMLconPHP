<?php

require_once 'Conexion.php';
require_once 'Alumno.php';

class AlumnoBD
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function obtenerTodos()
    {
        $stmt = $this->conn->prepare('SELECT * FROM alumno');
        $stmt->execute();
        $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($data) => new Alumno($data), $alumnos);
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM alumno WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new Alumno($data) : null;
    }

    public function eliminarPorId($id)
    {
        $alumno = $this->obtenerPorId($id);
        if ($alumno) {
            $stmt = $this->conn->prepare('DELETE FROM alumno WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        return $alumno;
    }

    public function crear($data)
    {
        $stmt = $this->conn->prepare('
            INSERT INTO alumno (nombre, apellidos, password, telefono, email, sexo, fecha_nacimiento)
            VALUES (:nombre, :apellidos, :password, :telefono, :email, :sexo, :fecha_nacimiento)
        ');
        $stmt->execute($data);
        $data['id'] = $this->conn->lastInsertId();
        return new Alumno($data);
    }

    public function modificar($id, $data)
    {
        $campos = [];
        foreach ($data as $campo => $valor) {
            if (!empty($valor)) {
                $campos[] = "$campo = :$campo";
            }
        }
        $sql = 'UPDATE alumno SET ' . implode(', ', $campos) . ' WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;
        $stmt->execute($data);
        return $this->obtenerPorId($id);
    }
}
