<?php
session_start();
include_once '../models/User.php';
include_once '../models/Connexion.php';

if (isset ($_GET['id']) && !empty( $_GET['id']) && $_SESSION['id'] != $_GET['id'])
    {
        $userAdmin = new User();
        $userAdmin->userModify('client', $_GET['id']);
        header( 'Location: ../index.php?view=dashboard/users');
        exit();
    }
else{
    
    $userAdmin = new User();
    $userAdmin->userModify('client', $_GET['id']);
    $connexion = new Connexion();
    $connexion->logout();
    header( 'Location: ../index.php?view=front/home');
    exit();
}

?>