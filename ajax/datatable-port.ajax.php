<?php

require_once "../controllers/port.controller.php";

require_once "../models/port.model.php";

class TablePort
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerPort::ctrShowPort($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editPort' data-toggle='modal' data-target='#modalEditPort' codePort='" . $value["codigoPuerto"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deletePort' codePortDelete='" . $value["codigoPuerto"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigoPuerto"] . '",
                        "' . $value["nombrePuerto"] . '",
                        "' . $value["nombrePais"] . '",
                        "' . $value["codigoPPuerto"] . '",
                        "' . $value["codigoPais"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TablePort();
$table->showTable();
