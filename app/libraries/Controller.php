<?php
/*
 * Base Controller
 * Loads the models
 */
//require_once APPROOT.'/helpers/Util.php';
abstract class Controller
{
    protected $model;

    public function __construct($model)
    {
        $modelPath = Util\pathBuilder('models', $model);

        if (file_exists($modelPath)) {
            require_once $modelPath;
            $this->model = new $model();
        } else {
            die('Model does not exist');
        }
    }
    public function getModel()
    {
        return $this->model;
    }
}
