<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
require_once APPROOT.'/helpers/Util.php';

class Core{
    protected $currentView;
    protected $currentController;
    protected $params = [];

    public function __construct()
    {
        //define default values
        $modelSTR = 'IndexModel';
        $viewSTR = 'Index';
        $controllerSTR = 'Pages';

        $viewPath = Util\pathBuilder('views/pages',$viewSTR);
        $controllerPath = Util\pathBuilder('controllers', $controllerSTR );

        //print_r($this->getUrl());
        //get parameters as array from the query string
        $url = $this->getUrl();

        // Look in controllers for first value
        if (isset($url[0])) {
            $controllerPath = Util\pathBuilder('controllers', ucwords($url[0]));
            if (file_exists($controllerPath)) {
                // If exists, set as controller
                $controllerSTR = ucwords($url[0]);
                // Unset 0 Index
                unset($url[0]);
            }
        }
        // Check for second part of url to get view and model name
        if (isset($url[1])) {
            // Check to see if method exists in controller
            $viewPath = Util\pathBuilder('views/pages', $url[1]);
            if (file_exists($viewPath)) {
                $viewSTR = $url[1];
                //build model name by adding Model to the view Name
                $modelSTR = $url[1].'Model';
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Require and Instantiate the controller
        require_once $controllerPath;
        $this->currentController = new $controllerSTR($modelSTR);

        //view constructor takes modelOBJ, and controllerOBJ
        // Require and Instantiate the view
        require_once $viewPath;
        $this->currentView = new $viewSTR($this->currentController->getModel(), $this->currentController);
        $this->currentView->output();

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        //call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
