<?php
    include_once 'models/User.php';

    $newUser = new User();
    $user = $newUser->getOneUser($_SESSION['username']);

    if(!isset($_SESSION['username']))
    {
        header('Location: ./index.php?view=front/login');
        exit();
    }
?>

<div id="account">
    <div class="column card">
    
        <h1 class="glow">Mon compte</h1>
        
        <h2>Bienvenue <?= $_SESSION['username'] ?></h2>
        
            <?php if( isset( $_GET['success'] ) ) : ?>
                <p><?= $_GET['success'] ?></p>
            <?php endif; ?>
    
        <a class="buttonModify" href="index.php?view=front/modify-account"><i class="fas fa-user-edit fa-2x"></i> Modifier mon compte <i class="fas fa-user-edit fa-2x"></i></a>
        <a class="buttonMyOrders" href="index.php?view=front/account-orders"><i class="fas fa-list-ul fa-2x"></i> Mes commandes <i class="fas fa-list-ul fa-2x"></i></a>

        <?php if($user['role'] === 'admin') :?>
            <a class="buttonAdmin" href="index.php?view=dashboard/home"><i class="fas fa-tools fa-2x"></i> Panneau d'administration <i class="fas fa-tools fa-2x"></i></a>
            <a class="buttonAdmin" href="index.php?view=dashboard/orders"><i class="fas fa-list-ul fa-2x"></i> Gestion des commandes <i class="fas fa-list-ul fa-2x"></i></a>
        <?php elseif($user['role'] === 'prep') :?>
            <a class="buttonAdmin" href="index.php?view=dashboard/orders"><i class="fas fa-list-ul fa-2x"></i> Gestion des commandes<i class="fas fa-list-ul fa-2x"></i></a>
        <?php endif; ?>
    </div>
</div>