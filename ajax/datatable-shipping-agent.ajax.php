<?php

require_once "../controllers/shipping-agent.controller.php";

require_once "../models/shipping-agent.model.php";

class TableShippingAgent
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerShippingAgent::ctrShowShippingAgent($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            if ($value["estado"] == "DESHABILITADO") {
                $state = "<button class='btn btn-dark btn-sm btnChangeState' stateShippingAgent='HABILITADO' idAgteSA='" . $value["idAgte"] . "'>DESHABILITADO</button>";
            } else {
                $state = "<button class='btn btn-success btn-sm btnChangeState' stateShippingAgent='DESHABILITADO' idAgteSA='" . $value["idAgte"] . "'>HABILITADO</button>";
            }
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editShippingAgent' data-toggle='modal' data-target='#modalEditShippingAgent' idAgte='" . $value["idAgte"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteShippingAgent' idAgteDelete='" . $value["idAgte"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["razonSocial"] . '",
                        "' . $value["jurisdic"] . '",
                        "' . $state . '",
                        "' . $value["NroDoc"] . '",
                        "' . $value["tipoDoc"] . '",
                        "' . $value["direccion"] . '",
                        "' . $value["repreLegal"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableShippingAgent();
$table->showTable();
