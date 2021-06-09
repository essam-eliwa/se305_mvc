<?php
// If a file contains only PHP code, it is preferable to omit 
// the PHP closing tag at the end of the file. 
// This prevents accidental whitespace or new lines being added after the PHP closing tag, 
// which may cause unwanted effects because PHP will start 
// output buffering when there is no intention from the programmer to send any 
// output at that point in the script.
abstract class Model{
    protected $dbh;

    public function __construct(){
        $this->dbh = new Database;
    }


    public function getDBH(){
        return $this->dbh;
    }
    
}

