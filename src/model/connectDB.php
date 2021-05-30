<?php

declare(strict_types=1);

class ConnectDB{

    protected function connect(){
        try {
            $db = new PDO("mysql:host=mysql;dbname=coincoin;port=3306","root","root");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $db;
        } catch (Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }
}