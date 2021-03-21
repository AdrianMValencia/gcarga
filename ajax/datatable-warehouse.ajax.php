<?php

require_once "../controllers/warehouse.controller.php";

require_once "../models/warehouse.model.php";

class TableWarehouse
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerWarehouse::ctrShowWarehouse($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            if ($value["estado"] == "DESHABILITADO") {
                $state = "<button class='btn btn-dark btn-sm btnChangeState' stateWarehouse='HABILITADO' codeWarehouse='" . $value["codigo"] . "'>DESHABILITADO</button>";
            } else {
                $state = "<button class='btn btn-success btn-sm btnChangeState' stateWarehouse='DESHABILITADO' codeWarehouse='" . $value["codigo"] . "'>HABILITADO</button>";
            }
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editWarehouse' data-toggle='modal' data-target='#modalEditWarehouse' codeWarehouseEdit='" . $value["codigo"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteWarehouse' codeWarehouseDelete='" . $value["codigo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["nombre"] . '",
                        "' . $value["razonSocial"] . '",
                        "' . $value["jurisdiccion"] . '",
                        "' . $value["direccion"] . '",
                        "' . $value["repreLegal"] . '",
                        "' . $value["oficina"] . '",
                        "' . $value["telefono"] . '",
                        "' . $state . '",
                        "' . $value["idAlmacen"] . '",
                        "' . $value["NroDoc"] . '",
                        "' . $value["tipoDoc"] . '"        
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableWarehouse();
$table->showTable();
