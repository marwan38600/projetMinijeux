<?php

namespace core;

use src\Controllers\ProductController;

class App
{
    public function run()
    {
        if ($_SERVER['REQUEST_URI'] == '/') {
            echo 'bonjour';

        } else if ($_SERVER['REQUEST_URI'] == '/products') {
            $controller = new ProductController();
            $controller->index();

        } else if ($_SERVER['REQUEST_URI'] == '/modifier') {
            $controller = new ProductController();
            $controller->modifierQuantite();


        } else {
            http_response_code(404);
            echo 'Page introuvable';
        }

    }
}

?>