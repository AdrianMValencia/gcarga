<?php

require_once "../controllers/customs-broker.controller.php";

require_once "../models/customs-broker.model.php";

class TableCustomsBroker
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerCustomsBroker::ctrShowCustomsBroker($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            if ($value["estado"] == "DESHABILITADO") {
                $state = "<button class='btn btn-dark btn-sm btnChangeState' stateCustomsBroker='HABILITADO' codeCustomsBroker='" . $value["codigo"] . "'>DESHABILITADO</button>";
            } else {
                $state = "<button class='btn btn-info btn-sm btnChangeState' stateCustomsBroker='DESHABILITADO' codeCustomsBroker='" . $value["codigo"] . "'>HABILITADO</button>";
            }
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editCustomsBroker' data-toggle='modal' data-target='#modalEditCustomsBroker' codeCustomsBrokerEdit='" . $value["codigo"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteCustomsBroker' codeCustomsBrokerDelete='" . $value["codigo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["razonSocial"] . '",
                        "' . $value["jurisdic"] . '",
                        "' . $state . '",
                        "' . $value["NroDoc"] . '",
                        "' . $value["tipoDoc"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableCustomsBroker();
$table->showTable();
