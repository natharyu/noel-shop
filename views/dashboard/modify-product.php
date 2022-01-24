<?php

include_once 'models/Product.php';
    $newProduct = new Product();
    $Product = $newProduct->getOneProductById($_GET['id']);

    include_once 'models/Product_cat.php';
    $newCategory = new ProductCat();
    $categories = $newCategory->getAllProductCat();

?>



<?php if (isset ($_GET['error']) ) :?>
    <p class=error> 
        <?= $_GET['error'] ?>
    </p>
<?php endif; ?>
<div class="column" id="modifyProduct">
    <div class="card">
        <a class="button" href="index.php?view=dashboard/list-products"><i class="fas fa-long-arrow-alt-left"></i> Retour </i></a>
        <br><br>
        <h1 class="glow"> Modifiez votre produit</h1>
        <form action="handlers/modify-product.php?id=<?= $Product['id'] ?>" method="POST">
            <div class="column">
                <input type='hidden' name="id" value="<?= $Product['id'] ?>" >

                <label for="name">Nom du produit</label>
                <input type='text' name="name" value="<?= $Product['name']  ?>" > 
                
                <label for="description">Description</label>
                <input type="text" name="description" value="<?= $Product['description']  ?>">

                <label for="image">Visuel</label>
                <input type="text" name="image" value="<?= $Product['image']  ?>">

                <label for="stock_quantity">Quantité en stock</label>
                <input type="number" name="stock_quantity" value="<?= $Product['stock_quantity']  ?>">

                <label for="price">Prix</label>
                <input type="number" name="price" value="<?= $Product['price']  ?>">
                
                <label for="category">Catégories</label>

                <select name="category">
                    <?php foreach ($productCats as $productCat) : ?>
                        <option value="<?= $productCat['id'] ?>"><?= $productCat['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            

                    

            

            <button class="buttonSubmit" type="submit">Valider mes modifications</button>
        </form>
    </div>
</div>