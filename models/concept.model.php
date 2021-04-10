<?php

require_once "connection.php";

class ModelConcept
{
    public static function mdlShowConcept($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT $table.idCpto,codigo,nombre,afecto,condicion,tipoAfectacionIGV,tipoTributoIGV,afectoISC,tipoSistemaISC,tipoTributoISC,porcentISC,afectoDESC,codTipoDESC,porcentDES,ctaContable,IFNULL(montoFijoUSD,0.00),IFNULL(montoFijoEUR,0.00),IFNULL(montoFijoPEN,0.00),ctaContableVenta,ctaContableCompra,ctaContableREEM,comision FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT $table.idCpto,codigo,nombre,afecto,condicion,tipoAfectacionIGV,tipoTributoIGV,afectoISC,tipoSistemaISC,tipoTributoISC,porcentISC,afectoDESC,codTipoDESC,porcentDES,ctaContable,IFNULL(montoFijoUSD,0.00),IFNULL(montoFijoEUR,0.00),IFNULL(montoFijoPEN,0.00),ctaContableVenta,ctaContableCompra,ctaContableREEM,comision FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
