<?php
if(isset($_SESSION['username']) && !empty($_SESSION['username']))
{
include_once './models/User.php';
include_once './models/Address.php';
include_once './models/Way_type.php';
include_once './models/Delivery.php';
include_once './models/Payment.php';

$newUser = new User();
$user = $newUser->getOneUserById($_SESSION['id']);

$newAddress = new Address();
$address = $newAddress->getOneAddressById($user['id']);

$newWaytype = new Waytype();
$waytypes = $newWaytype->getAllWaytype();
}
?>

<div id="orderAddress">
    <div class="card">
        <div class="column">
            <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>

            <a class="button" href="index.php?view=front/shop"><i class="fas fa-long-arrow-alt-left"></i> Retour</a>
            <h1 class="glow">Adresse de livraison</h1>

            <?php if( isset( $_GET['error'] ) ) : ?>
                    <p class="error"><?= $_GET['error'] ?></p>
            <?php endif; ?>
            
            <?php if(isset($address['nom']) && !empty($address['nom'])): ?>
            <?php 

            $newDelivery = new Delivery();
            $delivery = $newDelivery->getAllDelivery($address['type_livraison']); 
            
            $newPayment = new Payment();
            $payments = $newPayment->getAllPayment();
            
            ?>
            <form action="handlers/modify-address.php" name="address" method="POST">
<div class="flex">
    <div class="column card">
                <h2>Verifier votre adresse de livraison</h2>
                <input type="hidden" name="id" value="<?=$address['id'] ?>"/>
                <div class="flex">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" placeholder="Nom" value="<?=$address['nom'] ?>"/>
                </div>
                <div class="flex">
                    <label for="prenom">Prenom :</label>
                    <input type="text" name="prenom" placeholder="Prénom" value="<?=$address['prenom'] ?>"/>
                </div>
                <div class="flex">
                    <label for="nb_voie">Numéro de la voie :</label>
                    <input type="text" name="nb_voie" placeholder="Numéro de la voie" value="<?=$address['nb_voie'] ?>"/>
                </div>
                <div class="flex">
                    <label for="waytype">Type de voie :</label>
                    <select name="waytype">
                        <?php foreach ($waytypes as $waytype) : ?>
                        
                                <option value="<?= $waytype['id'] ?>"<?php if( $waytype['id'] === $address['type_voie']) {echo 'selected';} ?>>
                                    <?= $waytype['name'] ?>
                                </option>
    
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex">
                    <label for="nom_voie">Nom de la voie</label>
                    <input type="text" name="nom_voie" placeholder="Nom de la voie" value="<?= $address['nom_voie'] ?>"/>
                </div>
                
    </div>
    <div class="column card">
                <div class="flex">
                    <label for="code_postal">Code Postal</label>
                    <input type="text" name="code_postal" placeholder="Code postal" value="<?= $address['code_postal'] ?>"/>
                </div>
                <div class="flex">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" placeholder="Ville" value="<?= $address['ville'] ?>"/>
                </div>
                <div class="flex">
                    <label for="telephone">N° Telephone</label>
                    <input type="tel" name="telephone" placeholder="téléphone" value="<?= $address['telephone'] ?>"/>
                </div>
                
                <h2>Verifier votre mode de livraison</h2>
                <select name="deliverytype">
                    <?php foreach ($delivery as $deliver) : ?>
                    
                            <option value="<?= $deliver['id'] ?>"<?php if( $deliver['id'] === $address['type_livraison']) {echo 'selected';} ?>>
                                <?= $deliver['name'] ?>
                            </option>

                    <?php endforeach; ?>
                </select>

                <h2>Verifier votre mode de paiement</h2>
                <select name="payment">
                    <?php foreach ($payments as $payment) : ?>
                    
                            <option value="<?= $payment['id'] ?>"<?php if( $payment['id'] === $address['type_paiement']) {echo 'selected' ;} ?>>
                                <?= $payment['name'] ?>
                            </option>

                    <?php endforeach; ?>
                </select>
    </div>
</div>
<div class="column">
                <button class="button" type="submit">Passer à l'étape suivante</button></div>
            </form>
            <?php else: ?>

            <?php 
            $newDelivery = new Delivery();
            $delivery = $newDelivery->getAllDelivery(); 

            $newPayment = new Payment();
            $payments = $newPayment->getAllPayment();
            ?>
                
                <form action="handlers/add-address.php" name="address" method="POST">
                    <h2>Entrez une nouvelle adresse de livraison</h2>
                    <input type="hidden" name="id" value="<?= $user['id'] ?>" />
                    <input type="text" name="nom" placeholder="Nom"/>
                    <input type="text" name="prenom" placeholder="Prénom"/>
                    <input type="text" name="nb_voie" placeholder="Numéro de la voie" />
                    <select name="waytype">
                        <?php foreach ($waytypes as $waytype) : ?>
                        
                                <option>
                                    <?= $waytype['name'] ?>
                                </option>

                        <?php endforeach; ?>
                    </select>
                    <input type="text" name="nom_voie" placeholder="Nom de la voie" />
                    <input type="text" name="code_postal" placeholder="Code postal" />
                    <input type="text" name="ville" placeholder="Ville" />
                    <input type="tel" name="telephone" placeholder="téléphone" />

                    <h2>Selectionnez votre mode de livraison</h2>
                    <select name="deliverytype">
                        <?php foreach ($delivery as $deliver) : ?>
                        
                                <option>
                                    <?= $deliver['name'] ?>
                                </option>

                        <?php endforeach; ?>
                    </select>

                    <h2>Selectionnez votre mode de paiement</h2>
                    <select name="payment">
                        <?php foreach ($payments as $payment) : ?>
                        
                                <option>
                                    <?= $payment['name'] ?>
                                </option>

                        <?php endforeach; ?>
                    </select>
                        
                    <button class="button" type="submit">Passer à l'étape suivante</button>
                </form>
                        
                <?php endif; ?>

                <?php else : ?>
            
                    <h2>Vous devez être connecter pour acceder à cette page !</h2>
                    <a class="button" href="index.php?view=front/login">Se connecter</a>
            
                <?php endif; ?>
        </div>
    </div>
</div>