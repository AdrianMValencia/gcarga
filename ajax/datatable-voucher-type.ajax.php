<?php

require_once "../controllers/voucher-type.controller.php";

require_once "../models/voucher-type.model.php";

class TableVoucherType
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerVouchertype::ctrShowVouchertype($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editVoucherType' data-toggle='modal' data-target='#modalEditVoucherType' idVoucherType='" . $value["Id_Comprobante"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteVoucherType' idVoucherTypeDelete='" . $value["Id_Comprobante"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["Codigo"] . '",
                        "' . $value["Descripcion"] . '",
                        "' . $value["Serie"] . '",
                        "' . $value["Activado"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableVoucherType();
$table->showTable();
