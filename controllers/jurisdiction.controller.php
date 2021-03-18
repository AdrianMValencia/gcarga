<?php

class ControllerJurisdiction
{
    public static function ctrShowJurisdiction()
    {
        $table = "almacen";
        $response = ModelJurisdiction::mdlShowJurisdiction($table);
        return $response;
    }

    public static function ctrShowCodeJurisdiction()
    {
        $table = "agente_aduana";
        $response = ModelJurisdiction::mdlShowCodeJurisdiction($table);
        return $response;
    }
}
