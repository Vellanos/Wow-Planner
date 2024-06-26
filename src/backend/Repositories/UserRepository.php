
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
        $req = $this->getDb()->prepare("SELECT DATE_FORMAT(EventTable.date, '%d/%m/%Y') AS date, DATE_FORMAT(EventTable.horaire, '%H:%i') AS horaire, Raid.nom, Raid.img , EventTable.id
        FROM EventTable 
        JOIN Raid ON EventTable.raid_id = Raid.id 
        WHERE EventTable.user_id = :id 
        AND EventTable.date > CURDATE() 
        ORDER BY EventTable.date, EventTable.horaire 
        LIMIT 3;
        ");

        $req->execute([
            'id' => $userId
        ]);

        return $req->fetchAll();
    }

    public function findThreeCharacters($userId)
    {
        $req = $this->getDb()->prepare("SELECT Personnage.id, Personnage.nom, Classe.name_spec, Classe.icone 
        FROM Personnage 
        JOIN Classe ON Personnage.classe_id = Classe.id
        WHERE Personnage.user_id = :id
        ORDER BY Personnage.nom
        LIMIT 3;");

        $req->execute([
            'id' => $userId
        ]);

        return $req->fetchAll();
    }

    public function update($id, $pseudo, $mail, $mdp, $guild)
    {
        $query = 'UPDATE User set pseudo = :pseudo, mail = :mail,mdp = :mdp, guild = :guild WHERE id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $id,
            'pseudo' => $pseudo,
            'mail' => $mail,
            'mdp' => $mdp,
            'guild' => $guild,
        ]);
    }

    public function delete($id)
    {
        $query = 'DELETE FROM EventHasPerso
        WHERE EventHasPerso.personnage_id IN (
            SELECT Personnage.id
            FROM Personnage
            WHERE Personnage.user_id = :id
        );
        DELETE FROM Personnage
                WHERE Personnage.user_id = :id;
                DELETE FROM EventTable
                WHERE EventTable.user_id = :id;
                DELETE FROM `User`
                WHERE id = :id;';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $id,
        ]);
    }
}
