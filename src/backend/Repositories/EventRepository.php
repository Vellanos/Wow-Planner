
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

    public function findOneById($eventId)
    {
        $req = $this->getDb()->prepare('SELECT EventTable.id, EventTable.date, EventTable.horaire, EventTable.raid_id, Raid.nom 
        FROM EventTable 
        JOIN Raid ON EventTable.raid_id = Raid.id
        WHERE EventTable.id = :eventId');

        $req->execute([
            'eventId' => $eventId
        ]);

        return $req->fetch();
    }

    public function findIfOld($eventId, $user_id)
    {
        $req = $this->getDb()->prepare('SELECT * 
        FROM EventTable
        WHERE EventTable.id = :eventId
        AND EventTable.date >= CURDATE()
        AND EventTable.user_id = :user_id');

        $req->execute([
            'eventId' => $eventId,
            'user_id' => $user_id,
        ]);

        return $req->fetch();
    }

    public function findRegisteredCharacters($eventId, $user_id) {
        $req = $this->getDb()->prepare('SELECT * 
        FROM Personnage
        WHERE Personnage.user_id = :user_id
        AND Personnage.id IN (SELECT EventHasPerso.personnage_id FROM EventHasPerso WHERE EventHasPerso.event_id = :eventId)');

        $req->execute([
            'user_id' => $user_id,
            'eventId' => $eventId
        ]);

        return $req->fetchAll();
    }

    public function findNoRegisteredCharacters($eventId, $user_id) {
        $req = $this->getDb()->prepare('SELECT * 
        FROM Personnage
        WHERE Personnage.user_id = :user_id
        AND Personnage.id NOT IN (SELECT EventHasPerso.personnage_id FROM EventHasPerso WHERE EventHasPerso.event_id = :eventId)');

        $req->execute([
            'user_id' => $user_id,
            'eventId' => $eventId
        ]);

        return $req->fetchAll();
    }

    public function registerCharacter($characterId, $eventId) {
        $query = 'INSERT INTO EventHasPerso (personnage_id, event_id) 
        VALUES (:characterId, :eventId)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'characterId' => $characterId,
            'eventId' => $eventId,
        ]);
    }

    public function deleteRegisterCharacter($characterId,$eventId) {
        $query = 'DELETE FROM EventHasPerso
        WHERE EventHasPerso.personnage_id = :characterId
        AND EventHasPerso.event_id = :eventId';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'characterId' => $characterId,
            'eventId' => $eventId,
        ]);
    }

    public function update($id, $date, $horaire, $raid_id, $user_id)
    {
        $query = 'UPDATE EventTable set date = :date, horaire = :horaire, raid_id = :raid_id, user_id = :user_id WHERE id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $id,
            'date' => $date,
            'horaire' => $horaire,
            'raid_id' => $raid_id,
            'user_id' => $user_id,
        ]);
    }

    public function delete($id)
    {
        $query = 'DELETE FROM EventHasPerso
        WHERE EventHasPerso.event_id = :id;
        DELETE FROM EventTable
        WHERE EventTable.id = :id;';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $id,
        ]);
    }
}
