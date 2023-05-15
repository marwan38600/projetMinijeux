<?php

namespace core;

use src\Controllers\LoginController;
use src\Controllers\ProductController;
use src\Controllers\UserController;

class App
{
    public function __construct()
    {
        session_start();
    }
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
            $controller->list();

        } else if ($uri == '/users/updateForm') {
            $controller = new UserController();
            $controller->updateForm();

        } else if ($uri == '/users/deleteForm') {
            $controller = new UserController();
            $controller->deleteForm();

        } else if ($uri == '/users/addForm') {
            $controller = new UserController();
            $controller->addForm();

        } else if ($uri == '/users/add') {
            $controller = new UserController;
            $controller->add();

        } else if ($uri == '/users/delete') {
            $controller = new UserController;
            $controller->delete();

        } else if ($uri == '/users/update') {
            $controller = new UserController;
            $controller->update();

            //--------------Login--------------//

        } else if ($uri == '/login') {
            $controller = new LoginController;
            $controller->login();






        } else {
            http_response_code(404);
            echo 'Page introuvable';
        }

    }
}

?>