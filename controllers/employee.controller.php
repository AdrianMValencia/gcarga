<?php

class ControllerEmployee
{
    public static function ctrShowEmployee($item, $value)
    {
        $table = "empleado";
        $response = ModelEmployee::mdlShowEmployee($table, $item, $value);
        return $response;
    }
}
