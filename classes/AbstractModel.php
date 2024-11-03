<?php

require_once 'Database.php';

abstract class AbstractModel{
    protected $db;

    public function __construct($dbName, $host, $username, $password) {
        $database = new Database($dbName, $host, $username, $password);
        $this->db = $database->connectToDatabase();
    }

    abstract public function create($arrayData);
    abstract public function update($arrayData);
    abstract public function delete($id);
    abstract public function read($id);
}