<?php
require_once 'UserModel.php';
class LogoutModel extends UserModel
{
    private $msg = 'Log out success';
    public function __construct()
    {
        flash('Logout_success', $this->msg);
    }
}
