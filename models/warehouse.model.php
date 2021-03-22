<?php

require_once "connection.php";

class ModelWarehouse
{
    public static function mdlShowWarehouse($table, $item, $value)
    {
        if ($item != null && $value != null) {
            $stmt = Connection::connect()->prepare("SELECT $table.idTipoDoc,codigo,nombre,razonSocial,jurisdiccion,direccion,repreLegal,oficina, telefono,estado,idAlmacen,NroDoc, (SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Connection::connect()->prepare("SELECT $table.idTipoDoc,codigo,nombre,razonSocial,jurisdiccion,direccion,repreLegal,oficina, telefono,estado,idAlmacen,NroDoc, (SELECT abrev FROM tipo_documento WHERE idTipoDoc=$table.idTipoDoc) as tipoDoc FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    public static function mdlCreateWarehouse($table, $data)
    {
        $stmt = Connection::connect()->prepare("INSERT INTO $table(codigo,nombre,razonSocial,jurisdiccion,direccion,repreLegal,oficina,telefono,estado,NroDoc,idTipoDoc) VALUES(:codigo,:nombre,:razonSocial,:jurisdiccion,:direccion,:repreLegal,:oficina,:telefono,:estado,:NroDoc,:idTipoDoc)");
        $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":razonSocial", $data["razonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":jurisdiccion", $data["jurisdiccion"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $data["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":repreLegal", $data["repreLegal"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $data["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $data["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $data["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":NroDoc", $data["NroDoc"], PDO::PARAM_STR);
        $stmt->bindParam(":idTipoDoc", $data["idTipoDoc"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->close();
        $stmt = null;
    }

    public static function mdlEditWarehouse($table, $data)
    {
        $stmt = Connection::connect()->prepare("UPDATE $table SET codigo = :codigo, nombre = :nombre, razonSocial = :razonSocial, jurisdiccion = :jurisdiccion, direccion = :direccion, repreLegal = :repreLegal, oficina = :oficina, telefono = :telefono, NroDoc = :NroDoc, idTipoDoc = :idTipoDoc WHERE codigo = :codigo");
        $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":razonSocial", $data["razonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":jurisdiccion", $data["jurisdiccion"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $data["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":repreLegal", $data["repreLegal"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $data["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $data["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":NroDoc", $data["NroDoc"], PDO::PARAM_STR);
        $stmt->bindParam(":idTipoDoc", $data["idTipoDoc"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->close();
        $stmt = null;
    }

    public static function mdlChangeStateWarehouse($table, $item1, $value1, $item2, $value2)
    {
        $stmt = Connection::connect()->prepare("UPDATE $table SET $item2 = :$item2 WHERE $item1 = :$item1");
        $stmt->bindParam(":" . $item2, $value2, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item1, $value1, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->close();
        $stmt = null;
    }

    public static function mdlDeleteWarehouse($table, $code)
    {
        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE codigo = :codigo");
        $stmt->bindParam(":codigo", $code, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->close();
        $stmt = null;
    }
}
