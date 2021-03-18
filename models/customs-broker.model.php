<?php

require_once "connection.php";

class ModelCustomsBroker
{
    public static function mdlShowCustomsBroker($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT idAgte,codigo,razonSocial,RTRIM(CONCAT(codJurisdic,' - ',jurisdiccion)) as jurisdic,estado,NroDoc,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=agente_aduana.idTipoDoc) as tipoDoc FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT idAgte,codigo,razonSocial,RTRIM(CONCAT(codJurisdic,' - ',jurisdiccion)) as jurisdic,estado,NroDoc,(SELECT abrev FROM tipo_documento WHERE idTipoDoc=agente_aduana.idTipoDoc) as tipoDoc FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    public static function mdlCreateCustomsBroker($table, $data)
    {
        $stmt = Connection::connect()->prepare("INSERT INTO $table(codigo,NroDoc,razonSocial,codJurisdic,jurisdiccion,estado,idTipoDoc) VALUES(:codigo,:NroDoc,:razonSocial,:codJurisdic,:jurisdiccion,:estado,:idTipoDoc)");
        $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":NroDoc", $data["NroDoc"], PDO::PARAM_STR);
        $stmt->bindParam(":razonSocial", $data["razonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":codJurisdic", $data["codJurisdic"], PDO::PARAM_STR);
        $stmt->bindParam(":jurisdiccion", $data["jurisdiccion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $data["estado"], PDO::PARAM_STR);
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
