<?php

class Classe
{
    private $id;
    private $name_class;
    private $name_spec;
    private $role;
    private $couleur;
    private $icone;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNameClass() {
        return $this->name_class;
    }

    public function setNameClass($name_class) {
        $this->name_class = $name_class;
    }

    public function getNameSpec() {
        return $this->name_spec;
    }

    public function setNameSpec($name_spec) {
        $this->name_spec = $name_spec;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }

    public function getIcone() {
        return $this->icone;
    }

    public function setIcone($icone) {
        $this->icone = $icone;
    }
}
?>
