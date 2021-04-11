<?php

class ControllerBankAccount
{
    public static function ctrShowBankAccount($item, $value)
    {
        $table = "banco";
        $response = ModelBankAccount::mdlShowBankAccount($table, $item, $value);
        return $response;
    }
}
