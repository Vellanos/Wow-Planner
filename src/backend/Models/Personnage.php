<?php

class Personnage
{
    private $id;
    private $nom;
    private $classe_id;
    private $user_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getClasseId() {
        return $this->classe_id;
    }

    public function setClasseId($classe_id) {
        $this->classe_id = $classe_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
}
?>
