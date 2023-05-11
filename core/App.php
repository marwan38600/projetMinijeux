<?php

namespace core;

use src\Controllers\ProductController;
use src\Controllers\UserController;

class App
{
    public function run()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        if ($uri == '/') {
            echo 'bonjour';

        } else if ($uri == '/products') {
            $controller = new ProductController();
            $controller->list();

        } else if ($uri == '/products/updateForm') {
            $controller = new ProductController();
            $controller->updateForm();

        } else if ($uri == '/products/deleteForm') {
            $controller = new ProductController();
            $controller->deleteForm();

        } else if ($uri == '/products/addForm') {
            $controller = new ProductController();
            $controller->addForm();

        } else if ($uri == '/products/add') {
            $controller = new ProductController;
            $controller->add();

        } else if ($uri == '/products/delete') {
            $controller = new ProductController;
            $controller->delete();

        } else if ($uri == '/products/update') {
            $controller = new ProductController;
            $controller->update();

            //--------------------USER--------------//

        } else if ($uri == '/users') {
            $controller = new UserController();
            $controller->index();

        } else if ($uri == '/users/ajouter') {
            $controller = new UserController;
            $controller->addOneInDb();

        } else if ($uri == '/users/supprimer') {
            $controller = new UserController;
            $controller->deleteOneInDb();

        } else if ($uri == '/users/update') {
            $controller = new UserController;
            $controller->updateInDB();





        } else {
            http_response_code(404);
            echo 'Page introuvable';
        }

    }
}

?>