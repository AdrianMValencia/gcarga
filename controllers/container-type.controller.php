<?php

class ControllerContainerType
{
    public static function ctrShowContainerType($item, $value)
    {
        $table = "tipo_contenedor";
        $response = ModelContainerType::mdlShowContainerType($table, $item, $value);
        return $response;
    }
}
