<?php

class ControllerUsers
{
    public static function ctrShowUsers($item, $value)
    {
        $table = "usuario";
        $response = ModelUsers::mdlShowUsers($table, $item, $value);
        return $response;
    }
}
