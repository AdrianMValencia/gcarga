<?php

require_once "../controllers/goods-services.controller.php";

require_once "../models/goods-services.model.php";

class TableGoodsServices
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerGoodsServices::ctrShowGoodsServices($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editGoodsServices' data-toggle='modal' data-target='#modalEditGoodsServices' idGoodsServices='" . $value["Id_BBSS"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteGoodsServices' idGoodsServicesDelete='" . $value["Id_BBSS"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["Codigo"] . '",
                        "' . $value["Descripcion"] . '",
                        "' . $value["Porcentaje"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableGoodsServices();
$table->showTable();
