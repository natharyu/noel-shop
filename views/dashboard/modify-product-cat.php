<?php

include_once 'models/Product_cat.php';
$newCat = new ProductCat();
$category= $newCat->getOneProductCatById($_GET['id']);
?>

<div class="column" id="addCategory">

    <div class="card">
        <a class="button" href="index.php?view=dashboard/product-cat"><i class="fas fa-long-arrow-alt-left"></i> Retour </i></a>
        <h1 class="glow">Modifier une catégorie de produit</h1>
    
        <form class="column" action="./handlers/modify-category.php" method="post">
    
            <label for="name">
                <h2>Modifier la catégorie "<?= $category['name'] ?>"</h2>
            </label>
            <div class="column">
                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                <input type="text" name="name" value="<?= $category['name'] ?>">
                <button class="button" type="submit">Valider la modification</button>
            </div>
        
        </form>
        <?php if (isset ($_GET['error']) ) :?>
                    <p class="error"> 
                        <?= $_GET['error'] ?>
                    </p>
        <?php endif; ?>
    </div>
</div>