<?php

class database
{

    public $conBD;

    public function __construct()
    {
        $this->conBD = new PDO('mysql:host=localhost;dbname=Formation;charset=utf8','user', 'Albert10?', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function selectbd($table)
    {
        try {
            $bd = $this->conBD->prepare("SELECT * FROM $table");
            $bd->execute();
            $result = $bd->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function relationDb()
    
    {
        try {
            $bd = $this->conBD->prepare("SELECT  FROM");
            $bd->execute();
            $result = $bd->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
