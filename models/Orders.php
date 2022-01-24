<?php

include_once 'Database.php';

class Order extends Database {
    public function getAllOrders()
    {
        return $this->getAll('orders');
    }
    public function getOneOrder( $value )
    {
        return $this->getOne( 'orders', 'order_number', $value );
    }
    public function getOneOrderById( $value )
    {
        return $this->getAllOne( 'orders', 'user_id', $value );
    }
    public function addOneOrder( $data )
    {
        return $this->addOne( 'orders', 'date, status, comment, user_id', '?, ?, ?, ?', $data );
    }

    public function updateOrder( $data, $id )
    {
        $this->updateOne( 'orders', $data, 'order_number', $id );
    }

    public function deleteOrder($id)
    {
        $sql = "DELETE FROM orders WHERE order_number = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}
?>