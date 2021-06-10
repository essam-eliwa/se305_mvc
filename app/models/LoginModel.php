<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'User Login Page';
    private $emailErr;
    private $passwordErr;


    public function __construct()
    {
        parent::__construct();
        $this->emailErr    = '';
        $this->passwordErr = '';
    }

    public function getEmailErr()
    {
        return $this->emailErr;
    }

    public function getPasswordErr()
    {
        return $this->passwordErr;
    }
}
