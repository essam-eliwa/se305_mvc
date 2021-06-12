<?php
require_once 'UserModel.php';
class RegisterModel extends UserModel
{
    public  $title = 'User Registration Page';
    protected $name;
    protected $nameErr;
    protected $confirmPassword;
    protected $confirmPasswordErr;


    public function __construct()
    {
        parent::__construct();
        $this->name     = "";
        $this->nameErr = "";

        $this->confirmPassword = "";
        $this->confirmPasswordErr = "";
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNameErr()
    {
        return $this->nameErr;
    }

    public function setNameErr($nameErr)
    {
        $this->nameErr = $nameErr;
    }

    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;
    }

    public function getConfirmPasswordErr()
    {
        return $this->confirmPasswordErr;
    }
    public function setConfirmPasswordErr($confirmPasswordErr)
    {
        $this->confirmPasswordErr = $confirmPasswordErr;
    }

    public function signup()
    {
        $this->dbh->query("INSERT INTO users (`name`, `email`, `password`) VALUES(:uname, :email, :pass)");
        $this->dbh->bind(':uname', $this->name);
        $this->dbh->bind(':email', $this->email);
        $this->dbh->bind(':pass', $this->password);

        return $this->dbh->execute();
    }
}
