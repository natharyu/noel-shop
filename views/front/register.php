<div id="register">
    <div class="column card">
        <h1 class="glow">Créer mon compte</h1>
    
        <form class="column" action="./handlers/register.php" method="POST">
    
            <?php if( isset( $_GET['error'] ) ) : ?>
            <p class="error"><?= $_GET['error'] ?></p>
            <?php endif; ?>
            
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="e-mail">
    
            <label for="username">Nom</label>
            <input type="text" name="username" placeholder="Nom d'utilisateur">
    
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe">
    
            <label for="passwordConfirm">Confirmer le mot de passe</label>
            <input type="password" name="passwordConfirm" placeholder="Confirmer le mot de passe">
            
            <button class="buttonSubmit" type="submit">S'inscrire</button>
    
        </form>
    </div>
</div>