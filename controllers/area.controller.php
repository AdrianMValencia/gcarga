<?php

class ControllerArea
{
    public static function ctrShowArea($item, $value)
    {
        $table = "area";
        $response = ModelArea::mdlShowArea($table, $item, $value);
        return $response;
    }
}
