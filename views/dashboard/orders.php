<!-- Affiche toutes les commandes (réservé aux admins et preparateurs de commande) donc faire nouveau role -->

<?php

include_once "models/Orders.php";
$newOrder = new Order();
$orders = $newOrder->getAllOrders();
?>

<div id="command" class="card">
<a class="button" href="index.php?view=dashboard/home"><i class="fas fa-long-arrow-alt-left"></i> Retour </a>
    <h1 class="glow">Commande</h1>
    <table>
        <thead>
           
                <td>Numéro de commande</td>
                <td>Date</td>
                <td>Commande</td>
                <td>Statut</td>
                <td>Modifier statut</td>
            
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?= $order['order_number'] ?></td>
                <td><?= $order['date'] ?></td>
                <td><?= $order['comment'] ?></td>
                <td><?= $order['status'] ?></td>
                <td>
                    <a  href="handlers/order-ready.php?id=<?=$order['order_number']?>"><button class="button">commande préparée</button></a>
                    <a  href="handlers/order-sent.php?id=<?=$order['order_number']?>"><button class="button">commande envoyée</button></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>