<?php

class ControllerForeignAgent
{
    public static function ctrShowForeignAgent($item, $value)
    {
        $table = "agente_exterior";
        $response = ModelForeignAgent::mdlShowForeignAgent($table, $item, $value);
        return $response;
    }
}
