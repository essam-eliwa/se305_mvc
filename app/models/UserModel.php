<?php
class UserModel extends model
{
    private $name;
    private $email;
    private $password;

    public function __construct()
    {
        parent::__construct();
        $this->name     = '';
        $this->email    = '';
        $this->password = '';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
