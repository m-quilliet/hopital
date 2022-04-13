<?php
require_once(dirname(__FILE__).'/../config/config.php');

class Database// pas besoin d'hydrater donc on va crreé méthode sttatique ms besoin de new database
{
    public static function dbConnect(): object 
    {
        try {
        $pdo= new PDO(DSN, USER, PASSWORD,[
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
        ]);
        } 
        catch (PDOException $e){
            $error= $e->getMessage();
            echo $error;
        }
        return $pdo;
    }
}


