<?php

class Conexion
{
    private static $host = '127.0.0.1';
    private static $db = 'colegio';
    private static $user = 'root';
    private static $password = '';
    private static $connection = null;

    public static function conectar()
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$db,
                    self::$user,
                    self::$password
                    
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                die('Error en la conexión: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
