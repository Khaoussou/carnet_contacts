<?php

namespace Model;

use Model\Database;

require_once("../model/Database.php");

class ContactClass
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function all()
    {
        return $this->database->request("SELECT nom, prenom, libelle FROM contact JOIN categorie ON categorie.id = contact.categorie_id");
    }

    public function allCat()
    {
        return $this->database->request("SELECT * FROM categorie");
    }

    public function insert($data)
    {
        $classeData = [$data['nom'], $data['prenom'], $data['categorie_id']];
        $requette = "INSERT INTO contact (nom, prenom, categorie_id) VALUES(?, ?, ?)";
        return $this->database->request($requette, $classeData);
    }
}
