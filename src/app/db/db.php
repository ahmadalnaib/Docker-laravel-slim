<?php

class DB {
    private $dbhost = 'mysql';  // Use the service name defined in docker-compose.yml
    private $dbuser = 'laravel';
    private $dbpass = 'laravel';
    private $dbname = 'laravel';
    private $dbport = '3306';

    public function connectDB(){
        $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname;port=$this->dbport";
        $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
}