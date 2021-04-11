<?php

class ControllerGoodsServices
{
    public static function ctrShowGoodsServices($item, $value)
    {
        $table = "bbss_detracciones";
        $response = ModelGoodsServices::mdlShowGoodsServices($table, $item, $value);
        return $response;
    }
}
