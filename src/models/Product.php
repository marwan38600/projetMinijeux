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

}