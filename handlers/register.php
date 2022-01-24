<?php
include_once '../models/User.php';
include_once '../models/Connexion.php';

try
{

    if( isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['passwordConfirm']) && !empty($_POST['passwordConfirm']))
        {
            $newUser = new User();
            $users = $newUser->getAllUsers();
            $username = $_POST['username'];
            $existingUser = [];

            $mail = $_POST['email'];
            $existingMail = [];

            foreach ($users as $user)
            {
                $existingUser[] = $user['username'];
                $existingmail[] = $user['email'];
            }
            if(in_array($username, $existingUser))
            {
                $error = "Cet utilisateur existe déjà, veuillez choisir un autre nom d\'utilisateur !";
                header('Location: ../index.php?view=front/register&error=' . $error );
                exit();
            }
            elseif(in_array($mail, $existingMail))
            {
                $error = "Ce mail existe déjà, veuillez choisir un autre mail !";
                header('Location: ../index.php?view=front/register&error=' . $error );
                exit();
            }
            else
            {
                if($_POST['password'] === $_POST['passwordConfirm'])
                {
                    $newUser->addOneUser([$_POST['username'], password_hash($_POST['password'], PASSWORD_BCRYPT), $_POST['email'], 'client']);                   
                    $newConnexion = new Connexion();
                    $newConnexion->login($_POST['username'], $user['id']);
                    
                    header('Location: ../index.php?view=front/home');
                    exit();
                }
                else
                {
                    throw new Exception("Les mots de passes saisis ne correspondent pas !");
                }
            }
            
        }
    else
    {
        throw new Exception('Tous les champs doivent être remplis !');
    }

}
catch ( Exception $exception )
{
    header('Location: ../index.php?view=front/register&error=' . $exception->getMessage() );
    exit();
}
?>