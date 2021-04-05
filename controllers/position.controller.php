<?php

class ControllerPosition
{
    public static function ctrShowPosition($item, $value)
    {
        $table = "cargo";
        $response = ModelPosition::mdlShowPosition($table, $item, $value);
        return $response;
    }
}
