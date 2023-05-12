<?php



namespace src\models;

use core\Basemodel;

class User extends BaseModel
{
    public function __construct()
    {
        $this->table = 'utilisateurs';
        $this->getConnection();
    }

    public function update($data)
    {


        $id = $data['id'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $email = $data['email'];
        $password = $data['password'];
        $budget = $data['budget'];
        $isAdmin = $data['isAdmin'];

        $sql = "UPDATE utilisateurs SET firstName = :firstName, lastName = :lastName, email = :email, password = :password, budget = :budget, isAdmin = :isAdmin WHERE id = :id";

        $query = $this->_connexion->prepare($sql);

        $query->bindParam(':id', $id);
        $query->bindParam(':firstName', $firstName);
        $query->bindParam(':lastName', $lastName);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':budget', $budget);
        $query->bindParam(':isAdmin', $isAdmin);

        $resultat = $query->execute();

        if ($resultat) {
            // Retourne le nombre de lignes affectées par la mise à jour
            return $query->rowCount();
        } else {
            // Retourne false si la mise à jour a échoué
            return false;
        }


    }

    public function deleteOneInDb($id)
    {
        $sql = "DELETE FROM utilisateurs WHERE id = :id";

        $query = $this->_connexion->prepare($sql);

        $query->bindParam(':id', $id);

        $resultat = $query->execute();

        if ($resultat) {
            // Retourne le nombre de lignes affectées par la mise à jour
            return $query->rowCount();
        } else {
            // Retourne false si la mise à jour a échoué
            return false;
        }

    }
    public function addToDb($firstName, $lastName, $email, $password, $budget, $isAdmin)
    {
        $sql = "INSERT INTO utilisateurs (firstName, lastName, email, password, budget, isAdmin) VALUES (:firstName, :lastName, :email, :password, :budget, :isAdmin)";
        $query = $this->_connexion->prepare($sql);

        $query->bindParam(':firstName', $firstName);
        $query->bindParam(':lastName', $lastName);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':budget', $budget);
        $query->bindParam(':isAdmin', $isAdmin);

        $resultat = $query->execute();
        return $resultat;

    }
}