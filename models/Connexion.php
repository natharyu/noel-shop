<?php
include_once 'Database.php';

class Connexion extends Database
{
    public function login($value, $id, $role='client')
    {
        session_start();
        $_SESSION['username'] = $value;
        $_SESSION['id'] = $id;
        $_SESSION['role'] =$role;
    }
    public function logout()
    {
        session_start();
        session_destroy();
    }
}

?>