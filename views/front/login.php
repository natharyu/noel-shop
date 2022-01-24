<div id="login">
        <div class="column card">
            <h1 class="glow"> Se connecter</h1>
            
            <form class="column" action="./handlers/login.php" method = "POST" >
                <input type ="text" name ="username" placeholder ="Identifiant..." />
                <input type ="password" name ="password" placeholder ="Mot de passe..." />
                <button class="buttonSubmit" type="submit">Connexion</button>
            
                <?php if (isset ($_GET['error']) ) :?>
                    <p class="error"> 
                        <?= $_GET['error'] ?>
                    </p>
                <?php endif; ?>
            </form>

            <h3>Pas encore de compte ? <a href="index.php?view=front/register">Créer un compte</a></h3>
        </div>
</div>
