<div class="column" id="addCategory">
    <div class="card">
        
            <a class="button" href="index.php?view=dashboard/product-cat"><i class="fas fa-long-arrow-alt-left"></i> Retour </i></a>
            <h1 class="glow">Ajouter une catégorie de produit</h1>
    
            <?php if (isset ($_GET['success']) ) :?>
                <p class="success"> 
                    <?= $_GET['success'] ?>
                </p>
            <?php endif; ?>
            <form class="column" action="./handlers/add-category.php" method="post">
        
                <label for="name">
                    <h2>Nom de la nouvelle catégorie</h2>
                </label>
                <div class="column">
                    <input type="text" name="name" placeholder="Nom de la catégorie">
                    <button class="button" type="submit">Ajouter</button>
                </div>
            
            </form>
            <?php if (isset ($_GET['error']) ) :?>
                        <p> 
                            <?= $_GET['error'] ?>
                        </p>
            <?php endif; ?>
        
    </div>
</div>