<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'bd_phase2');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}