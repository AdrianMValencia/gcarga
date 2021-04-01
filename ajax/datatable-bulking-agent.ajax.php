<?php

require_once "../controllers/bulking-agent.controller.php";

require_once "../models/bulking-agent.model.php";

class TableBulkingAgent
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerBulkingAgent::ctrShowBulkingAgent($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            if ($value["estado"] == "DESHABILITADO") {
                $state = "<button class='btn btn-dark btn-sm btnChangeState' stateBulkingAgent='HABILITADO' idAgteBA='" . $value["idAgte"] . "'>DESHABILITADO</button>";
            } else {
                $state = "<button class='btn btn-success btn-sm btnChangeState' stateBulkingAgent='DESHABILITADO' idAgteBA='" . $value["idAgte"] . "'>HABILITADO</button>";
            }
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editBulkingAgent' data-toggle='modal' data-target='#modalEditBulkingAgent' idAgte='" . $value["idAgte"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteBulkingAgent' idAgteDelete='" . $value["idAgte"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["razonSocial"] . '",
                        "' . $value["codJurisdic"] . '",
                        "' . $state . '",
                        "' . $value["Ruc"] . '",
                        "' . $value["Direccion"] . '",
                        "' . $value["Contacto"] . '",
                        "' . $value["tipoDoc"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableBulkingAgent();
$table->showTable();
