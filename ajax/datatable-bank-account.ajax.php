<?php

require_once "../controllers/bank-account.controller.php";

require_once "../models/bank-account.model.php";

class TableBankAccount
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerBankAccount::ctrShowBankAccount($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editBankAccount' data-toggle='modal' data-target='#modalEditBankAccount' idBankAccount='" . $value["idBanco"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteBankAccount' idBankAccountDelete='" . $value["idBanco"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["razonSocial"] . '",
                        "' . $value["direccion"] . '",
                        "' . $value["pseudonimo"] . '",
                        "' . $value["numeroCta"] . '",
                        "' . $value["numeroCCI"] . '",
                        "' . $value["swift"] . '",
                        "' . $value["moneda"] . '",
                        "' . $value["tipoCta"] . '",
                        "' . $value["ruc"] . '",
                        "' . $value["telefono"] . '",
                        "' . $value["paginaweb"] . '",
                        "' . $value["nombre"] . '",
                        "' . number_format($value["monto"], 1) . '",
                        "' . $value["beneficiario"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableBankAccount();
$table->showTable();
