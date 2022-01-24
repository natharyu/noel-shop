<?php
include_once 'models/Product.php';


$newProduct = new Product();
$products= $newProduct->getAllProducts();

?>

<div id="shop">
<div class="column card">
    <h1 class="glow">Boutique</h1>

    <div class="products">
        <?php foreach ($products as $product) : ?>
            <div class="product">
                <h3><?= $product['name'] ?></h3>
                <img src="./assets/images/shop/<?= $product['image'] ?>">
                <p>Prix :<?= $product['price'] ?> €</p>
                <p><?= $product['stock_quantity'] ?> unité(s) en stock</p>
                <a class="buttonSubmit" href="index.php?view=front/product&id=<?= $product['id'] ?>"><i class="fas fa-info-circle"></i> Détails</a>

                <button class="addToCartBtn button" 
                    data-stock="<?= $product['stock_quantity'] ?>" 
                    data-id="<?= $product['id'] ?>" 
                    data-name="<?= $product['name'] ?>"
                    data-image="<?= $product['image'] ?>"
                    data-price="<?= $product['price'] ?>">

                    <!-- <a value="<?= $product['id'] ?>" href="./handlers/cart.php?id=<?= $product['id']; ?>">-->
                        <i class="fas fa-cart-arrow-down"></i> Ajouter au panier
                    <!-- </a> -->
                </button>
            
            </div>
        <?php  endforeach; ?>
    </div>
</div>
</div>

