<?php

class ControllerPort
{
    public static function ctrShowPort($item, $value)
    {
        $table = "puerto";
        $response = ModelPort::mdlShowPort($table, $item, $value);
        return $response;
    }
}
