<?php

require_once "connection.php";

class ModelDocumentType
{
    public static function mdlShowDocumentType($table)
    {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->close();
        $stmt = null;
    }
}
