<?php
    include_once 'models/User.php';

    $newUser = new User();
    $user = $newUser->getOneUser($_SESSION['username']);

?>

<div class="column" id="dashboardHome">
    <div class="card">
        <nav class="adminNavbar">
            <?php if($user['role'] === 'admin') :?>
            <a class="button" href="index.php?view=dashboard/users"><i class="fas fa-users"></i> Gérer les utilisateurs</a>
            <a class="button" href="index.php?view=dashboard/product-cat"><i class="fas fa-folder-open"></i> Gérer les catégories de produit</i></a>
            <a class="button" href="index.php?view=dashboard/list-products"><i class="far fa-list-alt"></i> Gérer les produits</i></a>
            <?php endif ?>
        </nav>
    </div>
</div>