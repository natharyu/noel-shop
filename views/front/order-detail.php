<?php

include_once 'models/Orders.php';
include_once 'models/Order_details.php';
include_once 'models/Product.php';

$newOrderDetails = new OrderDetails();
$orderDetails = $newOrderDetails->getOneOrderDetailsByOrderNumber($_GET['id']);
$totalPrice = 0;
?>

<div id="accountOrderDetail" class="card">
    <div class="column">
        <h1 class="glow">Ma commande</h1>
        
            <h2>Numéro de commande : <?= $_GET['id'] ?></h2>
        
        <div class="flexWrap">
            <?php foreach( $orderDetails as $orderDetail ):?>
            <?php 
                $newProducts = new Product();
                $product = $newProducts->getOneProductById($orderDetail['product_id']); 
                $totalPrice += $product['price']?>

                
                    <div class="divCart">
                        <h2><?= $product['name'] ?> : <?= $product['price'] ?> €</h2>
                        <img src="assets/images/shop/<?= $product['image'] ?>" alt="image"/>
                        <p><?= $product['description'] ?></p>
                    </div>
                
            
            <?php endforeach; ?> 
        </div> 
            <h2 class="totalPriceOrderDetail">Prix total : <?= $totalPrice ?>€</h2>
    </div>  
</div>

