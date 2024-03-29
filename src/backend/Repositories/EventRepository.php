
<?php

class EventRepository extends Db
{
    public function findMyEvents($user_id)
    {
        $req = $this->getDb()->prepare('SELECT EventTable.id, EventTable.date, EventTable.horaire, Raid.nom, Raid.img
        FROM EventTable
        JOIN Raid ON EventTable.raid_id = Raid.id
        WHERE EventTable.user_id = :user_id
        AND EventTable.date >= CURDATE() ');

        $req->execute([
            'user_id' => $user_id
        ]);

        return $req->fetchAll();
    }

    public function findMyOldEvents($user_id)
    {
        $req = $this->getDb()->prepare('SELECT EventTable.id, EventTable.date, EventTable.horaire, Raid.nom, Raid.img
        FROM EventTable
        JOIN Raid ON EventTable.raid_id = Raid.id
        WHERE EventTable.user_id = :user_id
        AND EventTable.date < CURDATE() ');

        $req->execute([
            'user_id' => $user_id
        ]);

        return $req->fetchAll();
    }

    // public function findOneById($personnage_id)
    // {
    //     $req = $this->getDb()->prepare('SELECT Personnage.id, Personnage.nom, Classe.name_class, Classe.name_spec, Classe.role, Classe.icone 
    //     FROM Personnage 
    //     JOIN Classe ON Personnage.classe_id = Classe.id
    //     WHERE Personnage.id = :personnage_id');

    //     $req->execute([
    //         'personnage_id' => $personnage_id
    //     ]);

    //     return $req->fetch();
    // }

    // public function create($nom, $classe_id, $user_id)
    // {
    //     $query = 'INSERT INTO Personnage (nom, classe_id, user_id) 
    //     VALUES (:nom, :classe_id, :user_id)';

    //     $req = $this->getDb()->prepare($query);

    //     $req->execute([
    //         'nom' => $nom,
    //         'classe_id' => $classe_id,
    //         'user_id' => $user_id,
    //     ]);
    // }

    // public function update($id, $nom, $classe_id, $user_id)
    // {
    //     $query = 'UPDATE Personnage set nom = :nom, classe_id = :classe_id,user_id = :user_id WHERE id = :id';

    //     $req = $this->getDb()->prepare($query);

    //     $req->execute([
    //         'id' => $id,
    //         'nom' => $nom,
    //         'classe_id' => $classe_id,
    //         'user_id' => $user_id,
    //     ]);
    // }

    // public function delete($id)
    // {
    //     $query = 'DELETE FROM EventHasPerso
    //     WHERE EventHasPerso.personnage_id = :id;
    //     DELETE FROM Personnage
    //     WHERE Personnage.id = :id;';

    //     $req = $this->getDb()->prepare($query);

    //     $req->execute([
    //         'id' => $id,
    //     ]);
    // }
}
