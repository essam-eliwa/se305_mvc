<?php
class Users extends Controller
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
        } else {
            // Load form
            //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
            $viewPath = VIEWS_PATH . 'users/Register.php';
            require_once $viewPath;
            $view = new Register($this->getModel(), $this);
            $view->output();
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
        } else {
            // Load form
            //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
            $viewPath = VIEWS_PATH . 'users/Login.php';
            require_once $viewPath;
            $view = new Login($this->getModel(), $this);
            $view->output();
        }
    }
}
