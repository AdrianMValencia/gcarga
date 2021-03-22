<?php

require_once "../controllers/customs-broker.controller.php";

require_once "../models/customs-broker.model.php";

class AjaxCustomsBroker
{
    public $idAgte;
    public function ajaxShowCustomsBroker()
    {
        $item = "idAgte";
        $value = $this->idAgte;
        $response = ControllerCustomsBroker::ctrShowCustomsBroker($item, $value);
        echo json_encode($response);
    }

    public $idAgteCB;
    public $stateCustomsBroker;
    public function ajaxChangeState()
    {
        $table = "agente_aduana";
        $item1 = "idAgte";
        $value1 = $this->idAgteCB;
        $item2 = "estado";
        $value2 = $this->stateCustomsBroker;
        $response = ModelCustomsBroker::mdlChangeStateCustomsBroker($table, $item1, $value1, $item2, $value2);
        echo $response;
    }
}
if (isset($_POST["idAgte"])) {
    $editCustomsBroker = new AjaxCustomsBroker();
    $editCustomsBroker->idAgte = $_POST["idAgte"];
    $editCustomsBroker->ajaxShowCustomsBroker();
}
if (isset($_POST["stateCustomsBroker"])) {
    $changeState = new AjaxCustomsBroker();
    $changeState->idAgteCB = $_POST["idAgteCB"];
    $changeState->stateCustomsBroker = $_POST["stateCustomsBroker"];
    $changeState->ajaxChangeState();
}
