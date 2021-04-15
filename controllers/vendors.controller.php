<?php

class ControllerVendors
{
    public static function ctrShowVendors($item, $value)
    {
        $table = "proveedores";
        $response = ModelVendors::mdlShowVendors($table, $item, $value);
        return $response;
    }
}