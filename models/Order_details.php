<?php

include_once 'Database.php';

class OrderDetails extends Database {
    public function getAllOrderDetails()
    {
        return $this->getAll('order_details');
    }
    public function getOneOrderDetails( $value )
    {
        return $this->getOne( 'order_details', 'order_number', $value );
    }
    public function getOneOrderDetailsByOrderNumber( $value )
    {
        return $this->getAllOne( 'order_details', 'order_number', $value );
    }
    public function addOrderDetails( $data )
    {
        $this->addOne( 'order_details', 'order_number, product_id, quantity_ordered, price_each', '?, ?, ?, ?', $data );
    }

    public function updateOrderDetails( $data, $id )
    {
        $this->updateOne( 'order_details', $data, 'order_number', $id );
    }

    public function deleteOrder($id)
    {
        $sql = "DELETE FROM order_details WHERE order_number = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}
?>