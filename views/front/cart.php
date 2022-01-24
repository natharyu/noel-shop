<?php
include_once 'models/User.php';

if($_SESSION)
{
    $newUser = new User();
    $user= $newUser->getOneUserById($_SESSION['id']);
}

?>

<div class="card">
    <h1 class="column glow">Mon panier</h1>
    
    <?php if( isset( $_GET['error'] ) ) : ?>
                <p><?= $_GET['error'] ?></p>
    <?php endif; ?>
    
    <div class="flexWrap" id="viewCart"></div>
    <div class="column">
    <p id="totalPriceDiv"></p>
        <?php if($_SESSION) :?>
        <a class="button"  href="index.php?view=front/order&id=<?= $user['id'] ?>">Valider ma commande</a>
        
        <?php else: ?>
        <a class="button" href="index.php?view=front/order">Valider ma commande</a>
        <?php endif; ?>
    </div>
</div>
