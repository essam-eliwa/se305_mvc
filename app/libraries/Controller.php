<?php
/*
 * Base Controller
 * Loads the models and views
 */
require_once APPROOT.'/helpers/Util.php';
abstract class Controller
{
    protected $model;
    //protected $view;

    public function __construct($model){
        //echo  Util\pathBuilder('models',$model);
        //die('Testing');
        $modelPath = Util\pathBuilder('models',$model);
        //$viewPath = Util\pathBuilder('views/pages',$view);

        if (file_exists($modelPath)) {
            require_once $modelPath;
             $this->model = new $model();
        }else{
            die('Model does not exist');
        }

        // Check for view file
        // if (file_exists($viewPath)) {
        //     require_once $viewPath;
        //     $this->view = new $view($this->model);
        //     $this->view->output();
        // } else {
        //     // View does not exist
        //     die('View '. $viewPath . ' does not exist');
        // }
    }
    // Load model
    public function getModel()
    {
        return $this->model;
    }

    public function getView()
    {
        return $this->view;
    }
}
