<?php

class Database{
    public static function connect(){
        $host = 'localhost';
        $userName = 'decimo10';
        $password = '7250015';
        $dataBase = 'anaswayuu';
        $port = '3306';

        $conexion = new mysqli($host,$userName,$password,$dataBase,$port);
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}