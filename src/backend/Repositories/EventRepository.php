
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

    public function findAllRaids()
    {
        $req = $this->getDb()->prepare('SELECT * FROM Raid');

        $req->execute();

        return $req->fetchAll();
    }

    public function create($date, $horaire, $raid_id, $user_id)
    {
        $query = 'INSERT INTO EventTable (date, horaire, raid_id,user_id) 
        VALUES (:date, :horaire, :raid_id, :user_id)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'date' => $date,
            'horaire' => $horaire,
            'raid_id' => $raid_id,
            'user_id' => $user_id,
        ]);
    }

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
