<?php
class Pages extends Controller{

    public function index(){
        // $data = [
        //     'title' => 'MIU SE305 Blog',
        // ];

        // $this->loadView('pages/index', $data);
        $this->view->output();
    }

    // public function about(){
    //     $data = [
    //         'title' => 'About Us',
    //     ];

    //     $this->loadView('pages/about', $data);
    // }

    // public function test(){
    //     $data = [
    //         'val1' => 'Test MVC',
    //     ];

    //     $this->loadView('pages/test', $data);
    // }
}
