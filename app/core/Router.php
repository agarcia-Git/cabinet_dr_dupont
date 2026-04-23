<?php
class Router {
    private $routes = [];

    public function add($url, $controller, $method) {
        $this->routes[$url] = [
            'controller' => $controller,
            'method'     => $method
        ];
    }

    public function dispatch() {
        $url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';

        if (array_key_exists($url, $this->routes)) {
            $controller = $this->routes[$url]['controller'];
            $method     = $this->routes[$url]['method'];

            $file = 'app/controllers/' . $controller . '.php';

            if (file_exists($file)) {
                require_once $file;
                $obj = new $controller();
                $obj->$method();
            } else {
                die('Contrôleur introuvable : ' . $file);
            }
        } else {
            require_once 'app/controllers/HomeController.php';
            $obj = new HomeController();
            $obj->index();
        }
    }
}