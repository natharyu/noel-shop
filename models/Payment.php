<?php

include_once 'Database.php';

class Payment extends Database 
{
    public function getAllPayment()
    {
        return $this->getAll('paiement');
    }
    public function getOnePayment( $value )
    {
        return $this->getOne( 'paiement', 'id', $value );
    }
    public function getOnePaymentByName( $value )
    {
        return $this->getOne( 'paiement', 'name', $value );
    }
    public function addOnePayment( $data )
    {
        $this->addOne( 'paiement', 'name', '?', $data );
    }

    public function updatePayment( $data, $id )
    {
        $this->updateOne( 'paiement', $data, 'id', $id );
    }

    public function deletePayment($id)
    {
        $sql = "DELETE FROM paiement WHERE id = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}
?>
