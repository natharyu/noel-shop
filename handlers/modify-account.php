<?php
session_start();
include_once '../models/User.php';
include_once '../models/Connexion.php';

try
{

    if( isset( $_POST['id'] ) && !empty( $_POST['id'] ) &&
        isset( $_POST['email'] ) && !empty( $_POST['email'] ) &&
        isset( $_POST['username'] ) && !empty( $_POST['username'] ) &&
        empty( $_POST['currentPassword'] ) ||
        empty( $_POST['password'] ) || 
        empty( $_POST['confirmPassword'] ) )
    {
        $newUser = new User();
        $user = $newUser->getOneUserById($_POST['id']);
        
        $newUserData = [
                'username'=>$_POST['username'],
                'email'=>$_POST['email'],
            ];
        $newUser->updateUser( $newUserData, $_POST['id'] );
        
        $newConnexion = new Connexion();
        $newConnexion->login( $_POST['username'], $_SESSION['id'] );
        
        $success = 'Votre compte a été modifié';
        header( 'Location: ../index.php?view=front/account&success=' . $success);
        exit();
    }
    elseif( isset( $_POST['id'] ) && !empty( $_POST['id'] ) &&
        isset( $_POST['email'] ) && !empty( $_POST['email'] ) &&
        isset( $_POST['username'] ) && !empty( $_POST['username'] ) &&
        isset( $_POST['currentPassword'] ) && !empty( $_POST['currentPassword'] ) &&
        isset( $_POST['password'] ) && !empty( $_POST['password'] ) && 
        isset( $_POST['confirmPassword'] ) && !empty( $_POST['confirmPassword'] ) )
    {
        $newUser = new User();
        $user = $newUser->getOneUserById($_POST['id']);

        if( password_verify( $_POST['currentPassword'], $user['password'] ) )
        {
            if( $_POST['password'] === $_POST['confirmPassword'] )
            {
                $newUserData = [
                    'username'=>$_POST['username'],
                    'password'=>password_hash( $_POST['password'], PASSWORD_BCRYPT ),
                    'email'=>$_POST['email'],
                ];

                $newUser->updateUser( $newUserData, $_POST['id'] );

                $newConnexion = new Connexion();
                $newConnexion->login( $_POST['username'], $_SESSION['id'] );
                
                $success = 'Votre compte a été modifié';
                header( 'Location: ../index.php?view=front/account&success=' . $success);
                exit();
            }
            else
            {
                throw new Exception( 'Le nouveau mot de passe et la confirmation ne sont pas les mêmes' );
            }
        }
        else
        {
            throw new Exception( 'Mauvais mot de passe' );
        }
    }
    else
    {
        throw new Exception( 'Remplissez tous les champs' );
    }
   
}

catch( Exception $exception )
{
    header( 'Location: ../index.php?view=front/modify-account&error=' . $exception->getMessage() );
    exit();
}

?>