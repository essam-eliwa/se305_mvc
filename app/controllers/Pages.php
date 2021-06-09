<?php
class Pages extends Controller{

    public function index(){
        $viewPath = PAGES_PATH . 'Index.php';
        require_once $viewPath;
        $indexView = new Index($this->getModel(), $this);
        $indexView->output();
    }

    public function about(){
        $viewPath = PAGES_PATH . 'About.php';
        require_once $viewPath;
        $aboutView = new About($this->getModel(), $this);
        $aboutView->output();
    }
}
