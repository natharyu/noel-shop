<?php

include_once './models/Product.php';
include_once './models/User.php';

$productClass = new Product();
$product = $productClass->getOneProductById($_GET['id']);
if( isset($_SESSION['username']) )
{
    $newUser = new User();
    $user = $newUser->getOneUser($_SESSION['username']);
}


?>
<div class="column" id="productDetail">
    <div class="card">
            <div class="column"><a class="buttonCenter" href="index.php?view=front/shop"><i class="fas fa-long-arrow-alt-left"></i> Retour à la boutique</a></div> 
            <div class="flexproduct">
                <div class="picture">
                    <img src="assets/images/shop/<?= $product['image']?>" alt="<?= $product['name']?>">
                </div>
                <!-- Prix et quantite -->
                <div class="column productDetails divCart">
                    <h3><?= $product['name']?></h3>
                    <p><?= $product['description']?></p>
                    <h4 id="price" data-price="<?= $product['price'] ?>"><?= $product['price'] ?> €</h4>
                    <p>Quantité en stock : <?=  $product['stock_quantity']?></p>

                        <form class="flex" action="" method="POST">  
                            
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="name"  value="<?= $product['name'] ?>">
                                <input type="hidden" name="quantity" id="quantity" value="1">
                                <input type="hidden" name="price" id="price" value="<?= $product['price'] ?>">

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
                            
                        </form>
                    
                    <?php if( isset($_SESSION['username']) && ($user['role'] === 'admin') ) :?>
                            <a class="buttonModifyProduct" href="index.php?view=dashboard/modify-product&id=<?= $product['id']?>">Modifier ce produit</a>
                    <?php endif; ?>
    
    
                </div>
            </div>
        </div>

<!-- BOUTON MODIFIER ADMIN -->

