<?php

require_once "connection.php";

class ModelPort
{
    public static function mdlShowPort($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT A.idPuerto,A.codigo as codigoPuerto,A.nombre as nombrePuerto,B.nombre as nombrePais,A.codigoPuerto as codigoPPuerto,B.codigo as codigoPais FROM $table AS A, pais AS B WHERE $item = :$item AND A.codigoPais=B.codigo LIMIT 20");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT A.idPuerto,A.codigo as codigoPuerto,A.nombre as nombrePuerto,B.nombre as nombrePais,A.codigoPuerto as codigoPPuerto,B.codigo as codigoPais FROM $table AS A, pais AS B WHERE A.codigoPais=B.codigo LIMIT 20");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
