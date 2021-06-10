<?php
require_once 'UserModel.php';
class RegisterModel extends UserModel
{
    public  $title = 'User Registration Page';
    private $confirmPassword;
    private $nameErr;
    private $emailErr;
    private $passwordErr;
    private $confirmPasswordErr;


    public function __construct()
    {
        parent::__construct();
        $this->nameErr     = '';
        $this->emailErr    = '';
        $this->passwordErr = '';
        $this->confirmPassword = '';
    }

    public function getnameErr()
    {
        return $this->nameErr;
    }

    public function getEmailErr()
    {
        return $this->emailErr;
    }

    public function getPasswordErr()
    {
        return $this->passwordErr;
    }
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }
    public function getConfirmPasswordErr()
    {
        return $this->confirmPasswordErr;
    }
}
