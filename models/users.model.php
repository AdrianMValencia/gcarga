<?php

require_once "connection.php";

class ModelUsers
{
    public static function mdlShowUsers($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT $table.idUsu,nombres,usuario,clave,area,cargo,telefono,correo,logueo,codigo FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT $table.idUsu,nombres,usuario,clave,area,cargo,telefono,correo,logueo,codigo FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
