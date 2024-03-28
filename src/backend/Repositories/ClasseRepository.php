
<?php

class ClasseRepository extends Db
{
    public function findAll()
    {
        $req = $this->getDb()->prepare('SELECT *
        FROM Classe ');

        $req->execute();

        return $req->fetchAll();
    }
}
