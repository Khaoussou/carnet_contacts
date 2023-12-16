<?php

namespace Controller;

use Model\ContactClass;

require_once("../model/ContactClass.php");

class Ajax
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactClass();
    }

    public function allContact()
    {
        return $this->contactModel->all();
    }

    public function allCatt()
    {
        return $this->contactModel->allCat();
    }

    public function insertContact()
    {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $categorie = $_POST["categorie"];
        $this->contactModel->insert([
            'nom' => $nom,
            'prenom' => $prenom,
            'categorie_id' => $categorie
        ]);

        header("Location: " . "http://localhost:8000/");
        exit();
    }
}
