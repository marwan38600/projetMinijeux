<?php



namespace src\models;

use core\Basemodel;

class Product extends BaseModel
{
    public function __construct()
    {
        $this->table = 'produits';
        $this->getConnection();
    }

    public function update($data)
    {


        $id = $data['id'];
        $price = $data['price'];
        $quantity = $data['quantity'];

        $sql = "UPDATE produits SET price = :price, quantity = :quantity WHERE id = :id";

        $query = $this->_connexion->prepare($sql);

        $query->bindParam(':id', $id);
        $query->bindParam(':price', $price);
        $query->bindParam(':quantity', $quantity);

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
        $sql = "DELETE FROM produits WHERE id = :id";

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
}