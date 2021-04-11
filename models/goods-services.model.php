<?php

require_once "connection.php";

class ModelGoodsServices
{
    public static function mdlShowGoodsServices($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT $table.Id_BBSS,Codigo,Descripcion,Porcentaje FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT $table.Id_BBSS,Codigo,Descripcion,Porcentaje FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
