<?php

include_once '../models/Connexion.php';

$connexion = new Connexion();
$connexion->logout();

header( 'Location: ../index.php?view=front/home');
exit();