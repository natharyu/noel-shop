<?php

include_once '../models/Orders.php';

$newOrder = new Order();

$newOrderStatus = [
    'status' => 'EXPEDIEE'
];

$newOrder->updateOrder( $newOrderStatus, $_GET['id']);
header("Location: ../index.php?view=dashboard/orders");
exit();