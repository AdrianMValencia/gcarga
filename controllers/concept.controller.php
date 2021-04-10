<?php

class ControllerConcept
{
    public static function ctrShowConcept($item, $value)
    {
        $table = "conceptos";
        $response = ModelConcept::mdlShowConcept($table, $item, $value);
        return $response;
    }
}
