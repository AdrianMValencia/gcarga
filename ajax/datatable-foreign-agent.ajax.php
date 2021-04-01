<?php

require_once "../controllers/foreign-agent.controller.php";

require_once "../models/foreign-agent.model.php";

class TableForeignAgent
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerForeignAgent::ctrShowForeignAgent($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editForeignAgent' data-toggle='modal' data-target='#modalEditForeignAgent' idAgteExt='" . $value["idAgteExt"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteForeignAgent' idAgteExtDelete='" . $value["idAgteExt"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["nombre"] . '",
                        "' . $value["direccion"] . '",
                        "' . $value["idPais"] . '",
                        "' . $value["ciudad"] . '",
                        "' . $value["departamento"] . '",
                        "' . $value["provincia"] . '",
                        "' . $value["distrito"] . '",
                        "' . $value["codUbigeo"] . '",
                        "' . $value["contacto"] . '",
                        "' . $value["fono"] . '",
                        "' . $value["correo"] . '",
                        "' . $value["idTipoDoc"] . '",
                        "' . $value["nroDoc"] . '",
                        "' . $value["tipoAgte"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableForeignAgent();
$table->showTable();
