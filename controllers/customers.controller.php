<?php

class ControllerCustomers
{
    public static function ctrShowCustomers($item, $value)
    {
        $table = "clientes";
        $response = ModelCustomers::mdlShowCustomers($table, $item, $value);
        return $response;
    }
}
