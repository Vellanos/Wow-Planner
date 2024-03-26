
<?php

class UserRepository extends Db
{
    public function findByEmail($userEmail)
    {
        $req = $this->getDb()->prepare('SELECT * FROM User WHERE mail = :mail');

        $req->execute([
            'mail' => $userEmail
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, User::class);

        return $req->fetch();
    }

    public function create($pseudo, $mail, $mdp, $guild)
    {
        $query = 'INSERT INTO User (pseudo, mail, mdp, guild) 
        VALUES (:pseudo, :mail, :mdp, :guild)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'pseudo' => $pseudo,
            'mail' => $mail,
            'mdp' => $mdp,
            'guild' => $guild,
        ]);
    }

    public function findNextEvents($userId)
    {
        $req = $this->getDb()->prepare("SELECT DATE_FORMAT(EventTable.date, '%d/%m/%Y') AS date,
        DATE_FORMAT(EventTable.horaire, '%H:%i') AS horaire,
        Raid.nom,
        Raid.img
        FROM EventTable
        JOIN Raid ON EventTable.raid_id = Raid.id
        WHERE EventTable.user_id = :id
        ORDER BY EventTable.date, EventTable.horaire
        LIMIT 3;");

        $req->execute([
            'id' => $userId
        ]);

        return $req->fetchAll();
    }
}
