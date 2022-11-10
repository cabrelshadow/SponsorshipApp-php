<?php

session_start();

require '../db/db.php';

class DatabaseConfig
{
    protected $HOST;
    protected $USER;
    protected $PASSWORD;
    protected $DBNAME;

    public function __construct()
    {
        $host = HOST;
        $username = USER;
        $password = PASS;
        $database = DBNAME;
        if ($this->isIP($host)) {
            $this->HOST = $host;
        }
        $this->USER = $username;
        $this->PASSWORD = $password;
        $this->DBNAME = $database;

        return $this->ConnectToDatabase();
    }

    /**
     * ConnectToDatabase.
     */
    private function ConnectToDatabase(): PDO
    {
        try {
            $conn_without_database = new PDO("mysql:host=$this->HOST;", $this->USER, $this->PASSWORD);
            $conn_without_database->query("CREATE DATABASE IF NOT EXISTS $this->DBNAME");

            try {
                return new PDO("mysql:host=$this->HOST;dbname=$this->DBNAME", $this->USER, $this->PASSWORD);
            } catch (PDOException $e2) {
                echo 'Connexion2 failed: '.$e2->getMessage();
            }
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }
    }

    public function Con()
    {
        return $this->ConnectToDatabase();
    }

    /**
     * isIP.
     *
     * @param string value
     */
    private function isIP(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_IP);
    }
}
