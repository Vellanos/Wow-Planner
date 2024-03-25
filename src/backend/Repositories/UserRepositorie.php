
<?php

class UserRepository extends Db
{
    // public function getAll()
    // {
    //     $req = $this->getDb()->query('SELECT * FROM student');

    //     $data = $req->fetchAll(PDO::FETCH_CLASS, Student::class);

    //     return $data;
    // }

    public function findByEmail($userEmail)
    {
        $req = $this->getDb()->prepare('SELECT * FROM User WHERE mail = :mail');

        $req->execute([
            'mail' => $userEmail
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, User::class);

        return $req->fetch();
    }

    // public function findByName($studentName)
    // {
    //     $req = $this->getDb()->prepare('SELECT * FROM student WHERE name = :name');

    //     $req->execute([
    //         'name' => $studentName
    //     ]);

    //     $req->setFetchMode(PDO::FETCH_CLASS, Student::class);

    //     return $req->fetch();
    // }

    // public function create($name, $surname, $birthdate, $email, $department_id)
    // {
    //     $query = 'INSERT INTO student (name, surname, birthdate, email, department_id) 
    //     VALUES (:name, :surname, :birthdate, :email, :department_id)';

    //     $req = $this->getDb()->prepare($query);

    //     $req->execute([
    //         'name' => $name,
    //         'surname' => $surname,
    //         'birthdate' => $birthdate,
    //         'email' => $email,
    //         'department_id' => $department_id,
    //     ]);
    // }

    // public function delete($studentId)
    // {
    //     $query = 'DELETE FROM student WHERE id = :id';

    //     $req = $this->getDb()->prepare($query);

    //     $req->execute([
    //         'id' => $studentId
    //     ]);
    // }

    // public function update($id, $name, $surname, $birthdate, $email, $department_id)
    // {
    //     $query = 'UPDATE student set name = :name, surname = :surname, birthdate = :birthdate
    //     , email = :email, department_id = :department_id WHERE id = :id';

    //     $req = $this->getDb()->prepare($query);

    //     $req->execute([
    //         'id' => $id,
    //         'name' => $name,
    //         'surname' => $surname,
    //         'birthdate' => $birthdate,
    //         'email' => $email,
    //         'department_id' => $department_id,
    //     ]);
    // }
}
