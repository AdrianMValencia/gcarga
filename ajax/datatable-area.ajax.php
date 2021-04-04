<?php

require_once "../controllers/area.controller.php";

require_once "../models/area.model.php";

class TableArea
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerArea::ctrShowArea($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editArea' data-toggle='modal' data-target='#modalEditArea' idArea='" . $value["idArea"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteArea' idAreaDelete='" . $value["idArea"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["nombre"] . '",
                        "' . $value["telefono"] . '",
                        "' . $value["correo"] . '",
                        "' . $value["jefe"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableArea();
$table->showTable();
