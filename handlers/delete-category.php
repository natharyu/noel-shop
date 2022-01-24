<?php

include_once '../models/Product_cat.php';

if (isset ($_GET['id']) && !empty( $_GET['id']) )
    {
        $newProductCat = new ProductCat();
        $newProductCat->deleteCategory($_GET['id']);
    }

header( 'Location: ../index.php?view=dashboard/product-cat');
exit();

?>