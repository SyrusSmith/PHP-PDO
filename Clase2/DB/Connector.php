<?php

class Connector
{
    public static function make()
    {
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=movies_db;port=3306;charset=utf8mb4", "root", "root");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $pdo;

        } catch(PDOException $e){
            echo $e->getMessage();
            die('No se pudo conectar');
        }
    }


}