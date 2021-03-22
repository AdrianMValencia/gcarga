<?php

require_once "../controllers/warehouse.controller.php";

require_once "../models/warehouse.model.php";

class AjaxWarehouse
{
    public $codeWarehouseEdit;
    public function ajaxShowWarehouse()
    {
        $item = "codigo";
        $value = $this->codeWarehouseEdit;
        $response = ControllerWarehouse::ctrShowWarehouse($item, $value);
        echo json_encode($response);
    }

    public $codeWarehouseChange;
    public $stateWarehouseChange;
    public function ajaxChangeState()
    {
        $table = "almacen";
        $item1 = "codigo";
        $value1 = $this->codeWarehouseChange;
        $item2 = "estado";
        $value2 = $this->stateWarehouseChange;
        $response = ModelWarehouse::mdlChangeStateWarehouse($table, $item1, $value1, $item2, $value2);
        echo $response;
    }

    public $codeWarehouseDelete;
    public function ajaxDeleteWarehouse()
    {
        $response = ControllerWarehouse::ctrDeleteWarehouse($this->codeWarehouseDelete);
        echo $response;
    }

    public $validateCode;
    public function ajaxValidateCode()
    {
        $item = "codigo";
        $value = $this->validateCode;
        $response = ControllerWarehouse::ctrShowWarehouse($item, $value);
        echo json_encode($response);
    }
}
if (isset($_POST["codeWarehouseEdit"])) {
    $editWarehouse = new AjaxWarehouse();
    $editWarehouse->codeWarehouseEdit = $_POST["codeWarehouseEdit"];
    $editWarehouse->ajaxShowWarehouse();
}

if (isset($_POST["stateWarehouse"])) {
    $changeState = new AjaxWarehouse();
    $changeState->codeWarehouseChange = $_POST["codeWarehouse"];
    $changeState->stateWarehouseChange = $_POST["stateWarehouse"];
    $changeState->ajaxChangeState();
}

if (isset($_POST["codeWarehouseDelete"])) {
    $deleteWarehouse = new AjaxWarehouse();
    $deleteWarehouse->codeWarehouseDelete = $_POST["codeWarehouseDelete"];
    $deleteWarehouse->ajaxDeleteWarehouse();
}

if (isset($_POST["validateCode"])) {
    $validateCode = new AjaxWarehouse();
    $validateCode->validateCode = $_POST["validateCode"];
    $validateCode->ajaxValidateCode();
}
