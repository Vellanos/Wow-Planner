<?php

class EventTable
{
    private $id;
    private $date;
    private $horaire;
    private $raid_id;
    private $user_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getHoraire() {
        return $this->horaire;
    }

    public function setHoraire($horaire) {
        $this->horaire = $horaire;
    }

    public function getRaidId() {
        return $this->raid_id;
    }

    public function setRaidId($raid_id) {
        $this->raid_id = $raid_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
}
?>
