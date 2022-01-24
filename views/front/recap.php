<!-- récapitulatif de la commande + bouton valider ma commande qui recupere 
le panier et l envoie vers la table order et recperer laddresse -->

<?php
if(isset($_SESSION['username']) && !empty($_SESSION['username']))
{
    include_once './models/User.php';
    $newUser = new User();
    $user = $newUser->getOneUserById($_SESSION['id']);
    
    include_once './models/Address.php';
    $newAddress = new Address();
    $address = $newAddress->getOneAddressById( $user['id'] );
    
    include_once './models/Way_type.php';
    $newWayType = new Waytype();
    $way = $newWayType->getOneWaytype( $address['type_voie'] );
    
    include_once './models/Delivery.php';
    $newDelivery = new Delivery();
    $deliveryMode = $newDelivery->getOneDeliveryById( $address['type_livraison'] );
    
    include_once './models/Payment.php';
    $newPayment = new Payment();
    $paymentMode = $newPayment->getOnePayment( $address['type_paiement'] );
    
    include_once './models/Orders.php';
    $newOrder = new Order();
    
    include_once './models/Product.php';
    $newProduct = new Product();
}


?>

<div id="recapOrder">
    <div class="card">
        <div class="column">
            <div id="recapCart">
                <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
                
                <h1 class="glow">Récapitulatif de ma commande</h1>

                <div class="flexWrap" id="viewCart"></div>
                <p class="column" id="totalPriceDiv"></p>

                <div class="flex">
                    <div class="column bottomLeft">
                        <h2>Adresse</h2>
                            <p><?= $address['nom']. " " .$address['prenom'] ?></p>
                            <p><?= $address['nb_voie']. " " .$way['name']. " " .$address['nom_voie'] ?></p>
                            <p><?= $address['code_postal']. " " .$address['ville'] ?></p>
                    </div>
                
                    <div class="column bottomRight">
                        <h2>Type de livraison</h2>
                            <p><?= $deliveryMode['name'] ?></p>

                        <h2>Mode de paiement</h2>
                            <p><?= $paymentMode['name'] ?></p>
                    </div>
                </div>
                
                <div class="column">
                <button class="button" type="submit" id="recapValidate">Valider ma commande</button>
                </div>
            </div>
            <?php else : ?>
            
            <h2>Vous devez être connecter pour acceder à cette page !</h2>
            <a class="button" href="index.php?view=front/login">Se connecter</a>
            
            <?php endif; ?>
        </div>
    </div>
</div>