<?php 
include_once '../models/Product.php';
include_once '../models/Orders.php';
include_once '../models/Order_details.php';

session_start();

if( isset( $_POST['cart'] ) && !empty( $_POST['cart'] ) &&
    isset( $_SESSION['id'] ) && !empty( $_SESSION['id'] ) )
{
    $products = json_decode( $_POST['cart'] );
    
    $newProduct = new Product();
    $newOrders = new Order();
    $newOrderDetails = new OrderDetails();

    $orderNumber = $newOrders->addOneOrder( [date('Y-m-d'), 'Nouvelle commande', '', $_SESSION['id']] );
    foreach ($products as $product)
    {
        $productInCart = $newProduct->getOneProductById(  $product->id );
        
        $newOrderDetailsData =[
            $orderNumber,
            $productInCart['id'],
            1,
            $productInCart['price']
        ];

        $newOrderDetails->addOrderDetails( $newOrderDetailsData );
            
        if ($productInCart === null || $productInCart === false) {
            $response = (object) ['Aucun produit trouvé sous ce nom'];
            echo json_encode( $response );
            exit();
        }
    }
    echo json_encode( $orderNumber);
    exit();
}
    
else
{
    $response = (object) ['Aucun produit selectionne'];
    echo json_encode( $response );
    exit();
} 
?>