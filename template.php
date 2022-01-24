<?php

include_once 'models/Product_cat.php';
$newCat = new ProductCat();
$productCats= $newCat->getAllProductCat()

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Noël Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Mountains+of+Christmas:wght@400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css" type="text/css" />
    <link rel="stylesheet" href="assets/papanoel.css" type="text/css" />
    <link rel="icon" href="assets/images/logo.svg" />
    <!-- scripts ---------------------->
    <script type="text/javascript" src="assets/js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    
</head>

<body>
    
    <header>
        <div id ="flake">&#10052;</div>

        <nav class="navbar">
            <div class="headerLeft">
                <a href="index.php?view=front/home">
                    <img src="assets/images/logo.svg" alt="logo">
                </a>
                <a class="slogan" href="index.php?view=front/home">NOËL SHOP</a>
            </div>
            <ul class="headerCenter">

                <a class="buttonHeader shop" onmouseover="displayShopCategory()" onmouseout="hideShopCategory()" href="index.php?view=front/shop"><i class="fas fa-shopping-cart"></i> Boutique</a>
                <div onmouseover="displayShopCategory()" onmouseout="hideShopCategory()" class="shopCategory" id="ShopCategory">
                    <?php foreach ($productCats as $productCat) : ?>
                            <a  href="index.php?view=front/categorie&id=<?= $productCat['id'] ?>">
                            <li class="column"><?= $productCat['name'] ?></li>
                            </a>
                    <?php endforeach ?>
                </div> 

            </ul>
            <ul class="headerRight">  

                <li>
                    <a class="buttonHeader cart" onmouseover="displayCart()" onmouseout="hideCart()" href="index.php?view=front/cart"><i class="fas fa-shopping-basket"></i> Mon panier</a>         
                    <ul onmouseover="displayCart()" onmouseout="hideCart()" class="cartElement" id="myCart">
                    <div id="cart"></div>
                    </ul>
                </li>

                <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) :?>
                    <li>
                        <a class="buttonHeader" href="index.php?view=front/account"><i class="fas fa-user-circle"></i> Mon compte</a>
                    </li>
                    <li>
                        <a class="buttonHeader" href="./handlers/logout.php"><i class="fas fa-sign-in-alt"></i> Déconnexion</a>
                    </li>
                <?php else :?>
                    <li>
                        <a class="buttonHeader" href="index.php?view=front/register"><i class="fas fa-sign-in-alt"></i> Créer un compte</a>
                    </li>
                    <li>
                        <a class="buttonHeader" href="index.php?view=front/login"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                    </li>
                <?php endif ?>
            </ul>       
        </nav>
    </header>

    <main class="container">
        <?php include 'views/' . $view . '.php'; ?>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script src="assets/js/neige.js"></script> 
    <script src="assets/js/panier.js"></script>
    
</body>
</html>