<?php

    include_once 'models/User.php';

    $newUser = new User();
    $user = $newUser->getOneUser( $_SESSION['username'] );

?>
<div id="modify">
    <div class="column card">
        <a class="button" href="index.php?view=front/account"><i class="fas fa-long-arrow-alt-left"></i> Retour</a>
        <h1 class="glow">Modifier mon compte</h1>

        <form class="column" action="./handlers/modify-account.php" method="POST">

            <input type="text" name="username" value="<?= $_SESSION['username'] ?>"/>
            <input type="email" name="email" value="<?= $user['email']?>"/>
            <input type="password" name="currentPassword" placeholder="Mot de passe actuel"/>
            <input type="password" name="password" placeholder="Nouveau mot de passe"/>
            <input type="password"  name="confirmPassword" placeholder="Confirmation mot de passe"/>
            <input type="hidden" name="id" value="<?= $user['id'] ?>"/>
            <button class="button" type="submit">Modifier</button>

        </form>
    </div>
    
</div>

<?php if( isset( $_GET['error'] ) ) : ?>
        <p class="error"><?= $_GET['error'] ?></p>
<?php endif; ?>