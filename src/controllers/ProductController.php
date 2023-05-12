<?php

namespace src\Controllers;

use core\BaseController;
use src\models\Product;

class ProductController extends BaseController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Product;
    }

    // L'action index récupère les données du modèle et charge la vue
    public function list()
    {
        $products = $this->model->getAll();
        $this->render("products/list.html.twig", array('products' => $products));

        // Grâce aux méthodes du modèle, on récupère les données
        // que l'on stocke dans un tableau $produits
        // - - - Comment faire ?

        // Et on charge la vue, qui aura accès au tableau "$produits"
        // - - - Utilisez soit require() soit Twig
    }

    public function updateForm()
    {
        $this->model->id = $_GET['id'];
        $product = $this->model->getOne();
        $this->render("products/update.html.twig", [
            'product' => $product
        ]);
    }
    public function deleteForm()
    {
        $this->model->id = $_GET['id'];
        $product = $this->model->getOne();
        $this->render("products/delete.html.twig", [
            'product' => $product
        ]);
    }
    public function addForm()
    {
        $this->render("products/add.html.twig", []);
    }

    public function update()
    {
        // 2. transmettre au modèle ton tableau POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            ];

            $price = $_POST['price'];

            // Vérifier si la valeur est valide
            if ($price < 0.1) {
                echo "Le prix doit être supérieur ou égal à 0,10 €";
            } elseif ($price > 20.0) {
                echo "Le prix doit être inférieur ou égal à 20,00 €";
            } else {
                $product = new Product();
                $product->update($data);

                // 4. redirect vers /products
                header('Location: /products');
            }
        }
    }

    public function delete()
    {
        // 2. transmettre au modèle ton tableau POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = new Product();
            $product->deleteOneInDb($_POST['id']);
            header('Location: /products');
        }
    }
    public function add()
    {
        // 2. transmettre au modèle ton tableau POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = new Product();
            $product->addToDb($_POST['nom'], $_POST['prix'], $_POST['quantite']);
            header('Location: /products');
        }
    }
}