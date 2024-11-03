<?php

class Database{
    private $host;
    private $db;
    private $username;
    private $password;
    private $dsn;
    private $connection = null;


    // costruttore da migliorare
    public function __construct($db,$host, $username = "",$password ="")
    {
        $this->db = $db;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dsn = "mysql:host=". $this->host.";"."dbname=". $this->db . ";" . "charset=utf8mb4";
       
    }

    public function dbData(){
            return "Dati di istanza:\n".
                    "DB: " . $this->db . "\n".
                    "Host: " . $this->host . "\n".
                    "User: " . $this->username . "\n";
    }

    public function connectToDatabase(){
        if($this->connection == null){
            try{
                $this->connection = new PDO($this->dsn,$this->username,$this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connessione stabilita con il DB: {$this->db}";
                return $this->connection;
            }catch(PDOException $e){
                echo "Errore di connesione: " . $e->getMessage();
            }
        }
        else
            return $this->connection;
    }
    
}