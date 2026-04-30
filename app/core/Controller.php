<?php
class Controller {
    protected $db;
    
    protected function render($view, $data = []) {
        extract($data);
        $path = $_SERVER['DOCUMENT_ROOT'] . '/Cabinet_Dr_Dupont/app/views/' . $view . '.php';
        require_once $path;
    }
}