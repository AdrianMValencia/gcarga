<?php

class ControllerShippingAgent
{
    public static function ctrShowShippingAgent($item, $value)
    {
        $table = "agente_maritimo";
        $response = ModelShippingAgent::mdlShowShippingAgent($table, $item, $value);
        return $response;
    }
}
