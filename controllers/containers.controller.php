<?php

class ControllerContainers
{
    public static function ctrShowContainers($item, $value)
    {
        $table = "contenedor";
        $response = ModelContainers::mdlShowContainers($table, $item, $value);
        return $response;
    }
}
