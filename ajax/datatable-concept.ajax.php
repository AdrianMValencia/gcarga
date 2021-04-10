<?php

require_once "../controllers/concept.controller.php";

require_once "../models/concept.model.php";

class TableConcept
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerConcept::ctrShowConcept($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editConcept' data-toggle='modal' data-target='#modalEditConcept' codeConcept='" . $value["codigo"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteConcept' codeConceptDelete='" . $value["codigo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["nombre"] . '",
                        "' . $value["afecto"] . '",
                        "' . $value["condicion"] . '",
                        "' . $value["tipoAfectacionIGV"] . '",
                        "' . $value["tipoTributoIGV"] . '",
                        "' . $value["afectoISC"] . '",
                        "' . $value["tipoSistemaISC"] . '",
                        "' . $value["tipoTributoISC"] . '",
                        "' . $value["porcentISC"] . '",
                        "' . $value["afectoDESC"] . '",
                        "' . $value["codTipoDESC"] . '",
                        "' . $value["porcentDES"] . '",
                        "' . $value["ctaContable"] . '",
                        "' . $value["IFNULL(montoFijoUSD,0.00)"] . '",
                        "' . $value["IFNULL(montoFijoEUR,0.00)"] . '",
                        "' . $value["IFNULL(montoFijoPEN,0.00)"] . '",
                        "' . $value["ctaContableVenta"] . '",
                        "' . $value["ctaContableCompra"] . '",
                        "' . $value["ctaContableREEM"] . '",
                        "' . $value["comision"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableConcept();
$table->showTable();
