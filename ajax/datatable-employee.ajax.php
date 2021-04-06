<?php

require_once "../controllers/employee.controller.php";

require_once "../models/employee.model.php";

class TableEmployee
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerEmployee::ctrShowEmployee($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editEmployee' data-toggle='modal' data-target='#modalEditEmployee' codeEmployee='" . $value["codigo"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteEmployee' codeEmployeeDelete='" . $value["codigo"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["codigo"] . '",
                        "' . $value["nombre"] . '",
                        "' . $value["dni"] . '",
                        "' . $value["direccion"] . '",
                        "' . $value["email"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableEmployee();
$table->showTable();
