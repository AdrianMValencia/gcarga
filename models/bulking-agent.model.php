<?php

require_once "connection.php";

class ModelBulkingAgent
{
    public static function mdlShowBulkingAgent($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT $table.idAgte,codigo,razonSocial,codJurisdic,estado,Ruc,Direccion,Contacto,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT $table.idAgte,codigo,razonSocial,codJurisdic,estado,Ruc,Direccion,Contacto,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    public static function mdlCreateBulkingAgent($table, $data)
    {
        $stmt = Connection::connect()->prepare("INSERT INTO $table(codigo,razonSocial,codJurisdic,estado,Ruc,Direccion,Contacto,idTipoDoc) VALUES(:codigo,:razonSocial,:codJurisdic,:estado,:Ruc,:Direccion,:Contacto,:idTipoDoc)");
        $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":razonSocial", $data["razonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":codJurisdic", $data["codJurisdic"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $data["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":Ruc", $data["Ruc"], PDO::PARAM_INT);
        $stmt->bindParam(":Direccion", $data["Direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":Contacto", $data["Contacto"], PDO::PARAM_STR);
        $stmt->bindParam(":idTipoDoc", $data["idTipoDoc"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->close();
        $stmt = null;
    }
}
