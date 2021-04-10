<?php

require_once "../controllers/container-type.controller.php";

require_once "../models/container-type.model.php";

class TableContainerType
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerContainerType::ctrShowContainerType($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            if ($value["estado"] == "CADUCADO") {
                $state = "<button class='btn btn-dark btn-sm btnChangeState' stateContainerType='VIGENTE' idContainerType='" . $value["idTipoConte"] . "'>CADUCADO</button>";
            } else {
                $state = "<button class='btn btn-success btn-sm btnChangeState' stateContainerType='CADUCADO' idContainerType='" . $value["idTipoConte"] . "'>VIGENTE</button>";
            }
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editContainerType' data-toggle='modal' data-target='#modalEditContainerType' idContainerType='" . $value["idTipoConte"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteContainerType' idContainerTypeDelete='" . $value["idTipoConte"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["idTipoConte"] . '",
                        "' . $value["nombre"] . '",
                        "' . $state . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableContainerType();
$table->showTable();
