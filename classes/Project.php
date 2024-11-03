<?php

require_once 'AbstractModel.php';

//Classe Project che permette di semplificare le interazioni con il DB
// per le operazioni CRUD sui progetti del portfolio.

class Project extends AbstractModel
{

    public function __construct($array)
    {
        parent::__construct($array);
    }

    // Create project
    public function create($array) {
        $query = "INSERT INTO projects (title, description, technologies, start_date, end_date, image, link, created_at, updated_at)
                  VALUES (:title, :description, :technologies, :start_date, :end_date, :image, :link, :created_at, :updated_at)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $array['title'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $array['description'], PDO::PARAM_STR);
        $stmt->bindParam(':technologies', $array['technologies'], PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $array['start_date'], PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $array['end_date'], PDO::PARAM_STR);
        $stmt->bindParam(':image', $array['image'], PDO::PARAM_STR);
        $stmt->bindParam(':link', $array['link'], PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $array['created_at'], PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $array['updated_at'], PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Read project
    public static function getAllProjects()
    {

        $quey = "SELECT * FROM projects";
        $stmt = this->db->prepare($quey);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function read($id){
        $query = "SELECT * FROM projects WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update project
    public function update($array)
    {
        //TODO
    }

    // Delete project
    public  function delete($id)
    {

        $query = "DELETE FROM projects WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}