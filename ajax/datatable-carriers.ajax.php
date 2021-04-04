<?php

require_once "../controllers/carriers.controller.php";

require_once "../models/carriers.model.php";

class TableCarriers
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerCarriers::ctrShowCarriers($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editCarriers' data-toggle='modal' data-target='#modalEditCarriers' codeCarriers='" . $value["codigo"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteCarriers' codeCarriersDelete='" . $value["codigo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["nombre"] . '",
                        "' . $value["nombreCorto"] . '",
                        "' . $value["ruc"] . '",
                        "' . $value["direccion"] . '",
                        "' . $value["telefono"] . '",
                        "' . $value["codAgen"] . '",
                        "' . $value["codDepo"] . '",
                        "' . $value["tipoDoc"] . '",
                        "' . $value["repreLegal"] . '",
                        "' . $value["tipoAgte"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableCarriers();
$table->showTable();
