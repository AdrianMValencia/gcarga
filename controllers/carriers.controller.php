<?php

class ControllerCarriers
{
    public static function ctrShowCarriers($item, $value)
    {
        $table = "transportistas";
        $response = ModelCarriers::mdlShowCarriers($table, $item, $value);
        return $response;
    }
}
