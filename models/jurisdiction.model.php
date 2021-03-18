<?php

require_once "connection.php";

class ModelJurisdiction
{
    public static function mdlShowJurisdiction($table)
    {
        $stmt = Connection::connect()->prepare("SELECT DISTINCT jurisdiccion FROM $table");
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->close();
        $stmt = null;
    }

    public static function mdlShowCodeJurisdiction($table)
    {
        $stmt = Connection::connect()->prepare("SELECT DISTINCT RTRIM(CONCAT(codJurisdic,' | ',jurisdiccion)) as jurisdic FROM $table");
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->close();
        $stmt = null;
    }
}
