<?php

require_once "connection.php";

class ModelVendors
{
    public static function mdlShowVendors($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT $table.idProv,$table.codigo,$table.nombre,$table.direc1,$table.nroDoc,$table.ciudad,pais.nombre as nombrePais,$table.direc2,$table.direc3,$table.fono1,$table.fono2,$table.email,$table.pagWeb,$table.repreLegal,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc,pais.codigo as codigoPais FROM $table, pais WHERE $table.idPais=pais.idPais AND $item = :$item ORDER BY $table.idProv DESC");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT $table.idProv,$table.codigo,$table.nombre,$table.direc1,$table.nroDoc,$table.ciudad,pais.nombre as nombrePais,$table.direc2,$table.direc3,$table.fono1,$table.fono2,$table.email,$table.pagWeb,$table.repreLegal,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc,pais.codigo as codigoPais FROM $table, pais WHERE $table.idPais=pais.idPais ORDER BY $table.idProv DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
