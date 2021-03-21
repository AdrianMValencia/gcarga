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
}
if (isset($_POST["idAgte"])) {
    $editCustomsBroker = new AjaxCustomsBroker();
    $editCustomsBroker->idAgte = $_POST["idAgte"];
    $editCustomsBroker->ajaxShowCustomsBroker();
}
