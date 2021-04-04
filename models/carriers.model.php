<?php

require_once "connection.php";

class ModelCarriers
{
    public static function mdlShowCarriers($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT codigo,nombre,nombreCorto,ruc,direccion,telefono,codAgen,codDepo,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc,repreLegal,tipoAgte FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT codigo,nombre,nombreCorto,ruc,direccion,telefono,codAgen,codDepo,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc,repreLegal,tipoAgte FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
