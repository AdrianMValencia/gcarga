<?php

require_once "../controllers/users.controller.php";

require_once "../models/users.model.php";

class TableUser
{
    public function showTable()
    {
        $item = null;
        $value = null;
        $response = ControllerUsers::ctrShowUsers($item, $value);

        if (count($response) == 0) {
            $dataJson = '{"data":[]}';
            echo $dataJson;
            return;
        }

        $dataJson = '{
            "data":[';
        foreach ($response as $key => $value) {
            $buttons = "<div class='btn-group'><button class='btn btn-warning btn-sm editUser' data-toggle='modal' data-target='#modalEditUser' idUsu='" . $value["idUsu"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm deleteUser' idUsuDelete='" . $value["idUsu"] . "'><i class='fas fa-trash-alt'></i></button></div>";
            $dataJson .= '
                    [
                        "' . $buttons . '",
                        "' . $value["nombres"] . '",
                        "' . $value["area"] . '",
                        "' . $value["cargo"] . '",
                        "' . $value["telefono"] . '",
                        "' . $value["correo"] . '",
                        "' . $value["logueo"] . '",
                        "' . $value["codigo"] . '"
                    ],';
        }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';
        echo $dataJson;
    }
}

$table = new TableUser();
$table->showTable();
