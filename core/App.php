<?php

namespace core;

use src\Controllers\ProductController;

class App
{
    public function run()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        if ($uri == '/') {
            echo 'bonjour';

        } else if ($uri == '/products') {
            $controller = new ProductController();
            $controller->index();

        } else if ($uri == '/modifier/') {
            $controller = new ProductController();
            $controller->updateForm();

        } else if ($uri == '/supprimer/') {
            $controller = new ProductController();
            $controller->deleteForm();


        } else if ($uri == '/products/update') {
            $controller = new ProductController;
            $controller->updateInDB();


        } else if ($uri == '/products/supprimer') {
            $controller = new ProductController;
            $controller->deleteOneInDb();


        } else {
            http_response_code(404);
            echo 'Page introuvable';
        }

    }
}

?>