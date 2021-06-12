<?php
class Pages extends Controller
{

    public function index()
    {
        $viewPath = VIEWS_PATH . 'pages/Index.php';
        require_once $viewPath;
        $indexView = new Index($this->getModel(), $this);
        $indexView->output();
    }

    public function about()
    {
        $viewPath = VIEWS_PATH . 'pages/About.php';
        require_once $viewPath;
        $aboutView = new About($this->getModel(), $this);
        $aboutView->output();
    }

    public function contact()
    {
        $viewPath = VIEWS_PATH . 'pages/Contact.php';
        require_once $viewPath;
        $contactView = new Contact($this->getModel(), $this);
        $contactView->output();
    }
}
