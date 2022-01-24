<?php
    include_once 'models/User.php';

    $newUser = new User();
    $user = $newUser->getOneUserById( $_SESSION['id'] );

    include_once 'models/Orders.php';

    $newOrder = new Order();
    $orders = $newOrder->getOneOrderById( $user['id'] );
?>

<div class="column" id="accountOrders">
    <div class="card">
        <div class="column">
        <a class="button" href="index.php?view=front/account"><i class="fas fa-long-arrow-alt-left"></i> Retour à mon compte</i></a>
            <h1 class="glow">Toutes mes commandes</h1>
        
            <table>
                <thead>
                    <td>Numéro de commande</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Ma commande</td>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
        
                    <tr>
                        <td><?= $order['order_number'] ?></td>
                        <td><?= $order['date'] ?></td>
                        <td><?= $order['status'] ?></td>
                        <td><a class="buttonSubmit" href="index.php?view=front/order-detail&id=<?= $order['order_number'] ?>"> Détails</i></a></td>
                    </tr>
                    
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>