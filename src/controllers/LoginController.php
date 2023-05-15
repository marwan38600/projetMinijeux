<?php

namespace src\Controllers;

use core\BaseController;
use src\models\User;

class LoginController extends BaseController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $authenticated = $user->authenticate($_POST['email'], $_POST['password']);
            if ($authenticated) {
                // Rediriger vers la page des produits si l'utilisateur est authentifié
                header('Location: /products');
            } else {
                // Afficher un message d'erreur si l'authentification a échoué
                echo "Identifiants invalides.";
            }
        }

        // Afficher le formulaire de connexion
        $this->render("connection/login.html.twig");
    }
}