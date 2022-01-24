<?php

include_once '../models/User.php';
include_once '../models/Connexion.php';

try 
{
    if( isset($_POST['username']) && !empty($_POST['username'] ) &&
        isset($_POST['password']) && !empty($_POST['password'] ) )
    {
        $newUser = new User();
        $newConnexion = new Connexion();
        
        $user = $newUser->getOneUser( $_POST['username'] );
        if($user)
        {
            if( password_verify( $_POST['password'], $user['password'] ) )
            {
                $newConnexion->login( $_POST['username'], $user['id']);  
                header('Location: ../index.php?view=front/home');
                exit();
            }
            else
            {
                throw new Exception ( "Nom d'utilisateur ou mot de passe incorrect") ;   
            }
        }
        else
        {
            throw new Exception ( "Utilisateur non trouvé" );    
        }
    }
    else
    {
        throw new Exception ( 'Remplissez les deux champs'); 
    }
}
catch ( Exception $amazing )
{
    header('Location: ../index.php?view=front/login&error=' . $amazing->getMessage());
    exit();
}

?>


