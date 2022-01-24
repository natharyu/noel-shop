<?php

include_once '../models/Product.php';

if (isset ($_GET['id']) && !empty( $_GET['id']) )
    {
        $newProduct = new Product();
        $newProduct->deleteProduct($_GET['id']);
    }

header( 'Location: ../index.php?view=dashboard/list-products');
exit();

?>