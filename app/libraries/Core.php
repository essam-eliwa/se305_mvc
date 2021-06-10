<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
require_once APPROOT . '/helpers/Util.php';

class Core
{
    private $currentController;
    private $params = [];

    public function __construct()
    {
        //define default values
        $modelName = 'IndexModel';
        $viewName = 'Index';
        $controllerName = 'Pages';

        //print_r($this->getUrl());
        //get parameters as array from the query string
        $url = $this->getUrl();

        // Look in controllers for first value
        if (isset($url[0])) {
            $controllerPath = Util\pathBuilder('controllers', ucwords($url[0]));
            if (file_exists($controllerPath)) {
                // If exists, set as controller
                $controllerName = ucwords($url[0]);
                // Unset 0 Index
                unset($url[0]);
            }
        }
        // Check for second part of url to get view and model name
        if (isset($url[1])) {
            // Check to see if method exists in controller
            $modelPath = Util\pathBuilder('models', $url[1] . 'Model');
            if (file_exists($modelPath)) {
                //build model name by adding Model to the view Name
                $modelName = $url[1] . 'Model';
                $viewName = $url[1];
            }
            unset($url[1]);
        }
        // Require and Instantiate the controller
        $controllerPath = Util\pathBuilder('controllers', $controllerName);
        require_once $controllerPath;
        $this->currentController = new $controllerName($modelName);

        if (!method_exists($this->currentController, $viewName)) {
            die(get_class($this->currentController) . ' does not contain method: ' . $viewName);
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        //util\debug([get_class($this->currentController), $viewName, $modelName]);

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $viewName], $this->params);
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
