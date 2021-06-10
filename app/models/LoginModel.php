<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'User Login Page';

    public function login($email, $password)
    {
        $this->dbh->query('SELECT * from users WHERE email = :email');
        $this->dbh->bind(':email', $email);

        $record = $this->dbh->single();
        $hash_pass = $record->password;
    }
}
