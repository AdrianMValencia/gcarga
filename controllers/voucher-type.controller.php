<?php

class ControllerVouchertype
{
    public static function ctrShowVouchertype($item, $value)
    {
        $table = "tipo_comprobante";
        $response = ModelVouchertype::mdlShowVouchertype($table, $item, $value);
        return $response;
    }
}
