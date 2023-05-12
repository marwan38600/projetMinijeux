<?php


namespace src\Controllers;

use core\BaseController;
use src\models\User;


class UserController extends BaseController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new User;
    }

    // L'action index récupère les données du modèle et charge la vue
    public function list()
    {
        $users = $this->model->getAll();
        $this->render("users/list.html.twig", array('users' => $users));

        // Grâce aux méthodes du modèle, on récupère les données
        // que l'on stocke dans un tableau $produits
        // - - - Comment faire ?

        // Et on charge la vue, qui aura accès au tableau "$produits"
        // - - - Utilisez soit require() soit Twig
    }

    public function updateForm()
    {
        $this->model->id = $_GET['id'];
        $user = $this->model->getOne();
        $this->render("users/update.html.twig", [
            'user' => $user
        ]);
    }
    public function deleteForm()
    {
        $this->model->id = $_GET['id'];
        $user = $this->model->getOne();
        $this->render("users/delete.html.twig", [
            'user' => $user
        ]);
    }
    public function addForm()
    {
        $this->render("users/add.html.twig", []);
    }

    public function update()
    {
        // 2. transmettre au modèle ton tableau POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $data = [
                'id' => $_POST['id'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'budget' => $_POST['budget'],
                'isAdmin' => $_POST['isAdmin']
            ];
            $user = new User();

            $user->update($data);

            // 4. redirect vers /users
            header('Location: /users');

            // }




        }

    }

    public function delete()
    {
        // 2. transmettre au modèle ton tableau POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = new User();

            $user->deleteOneInDb($_POST['id']);

            // 4. redirect vers /products
            header('Location: /users');

            // }

        }


    }
    public function add()
    {
        // 2. transmettre au modèle ton tableau POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = new User();

            $user->addToDb($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['budget'], $_POST['isAdmin']);

            // 4. redirect vers /products
            header('Location: /users');

        }

    }


}