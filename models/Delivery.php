<?php

include_once 'Database.php';

class Delivery extends Database 
{
    public function getAllDelivery()
    {
        return $this->getAll('livraison');
    }
    public function getOneDelivery( $value )
    {
        return $this->getAllOne( 'livraison', 'id', $value );
    }
    public function getOneDeliveryById( $value )
    {
        return $this->getOne( 'livraison', 'id', $value );
    }
    public function getOneDeliveryByName( $value )
    {
        return $this->getOne( 'livraison', 'name', $value );
    }
    public function addOneDelivery( $data )
    {
        $this->addOne( 'livraison', 'name', '?', $data );
    }

    public function updateDelivery( $data, $id )
    {
        $this->updateOne( 'livraison', $data, 'id', $id );
    }

    public function deleteDelivery($id)
    {
        $sql = "DELETE FROM livraison WHERE id = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}
?>
