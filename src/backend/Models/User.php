<?php

class User
{
    private $id;
    private $pseudo;
    private $mail;
    private $mdp;
    private $guild;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function getGuild()
    {
        return $this->guild;
    }

    public function setGuild($guild)
    {
        $this->guild = $guild;
    }
}
