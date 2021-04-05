<?php

require_once "../controllers/position.controller.php";

require_once "../models/position.model.php";

class TablePosition
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerPosition::ctrShowPosition($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editPosition' data-toggle='modal' data-target='#modalEditPosition' codCargo='" . $value["codCargo"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deletePosition' codCargoDelete='" . $value["codCargo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codCargo"] . '",
                        "' . $value["nombre"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TablePosition();
$table->showTable();
