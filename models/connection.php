<?php

class Connection
{
    public static function connect()
    {
        $link = new PDO("mysql:host=localhost;dbname=gcarga_ars", "root", "sasa");
        $link->exec("set names utf8");
        return $link;
    }
}