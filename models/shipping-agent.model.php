<?php

require_once "connection.php";

class ModelShippingAgent
{
    public static function mdlShowShippingAgent($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT $table.idAgte,codigo,razonSocial,RTRIM(CONCAT(codJurisdic,' - ',jurisdiccion)) as jurisdic,estado,NroDoc,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc,direccion,repreLegal FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT $table.idAgte,codigo,razonSocial,RTRIM(CONCAT(codJurisdic,' - ',jurisdiccion)) as jurisdic,estado,NroDoc,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc,direccion,repreLegal FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
