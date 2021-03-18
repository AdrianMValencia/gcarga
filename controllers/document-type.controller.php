<?php

class ControllerDocumentType
{
    public static function ctrShowDocumentType()
    {
        $table = "tipo_documento";
        $response = ModelDocumentType::mdlShowDocumentType($table);
        return $response;
    }
}
