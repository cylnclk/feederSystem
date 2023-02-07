<?php

class dbConnection
{
    protected $serverName;
    protected $username;
    protected $password;
    protected $dbName;

    public function __construct()
    {
        $this->serverName = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbName = 'productfeedersystem';

    }
    public function dbConnect()
    {
     try {
          $conn = mysqli_connect($this->serverName, $this->username, $this->password, $this->dbName);
        } catch (mysqli_sql_exception $e) {
            error_log($e->getMessage());
            echo "Database Connection Error! Please check database setting";
            http_response_code(500);
            die();
        }
        return $conn;
    }
}