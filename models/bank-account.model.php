<?php

require_once "connection.php";

class ModelBankAccount
{
    public static function mdlShowBankAccount($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT $table.idBanco,$table.codigo,$table.razonSocial,$table.direccion,$table.pseudonimo,$table.numeroCta,$table.numeroCCI,$table.swift,$table.moneda,$table.tipoCta,$table.ruc,$table.telefono,$table.paginaweb,pais.nombre,$table.monto,$table.beneficiario FROM $table, pais WHERE $table.idPais=pais.idPais AND $item = :$item ORDER BY $table.idBanco DESC");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT $table.idBanco,$table.codigo,$table.razonSocial,$table.direccion,$table.pseudonimo,$table.numeroCta,$table.numeroCCI,$table.swift,$table.moneda,$table.tipoCta,$table.ruc,$table.telefono,$table.paginaweb,pais.nombre,$table.monto,$table.beneficiario FROM $table, pais WHERE $table.idPais=pais.idPais ORDER BY $table.idBanco DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
