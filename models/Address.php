<?php

include_once 'Database.php';

class Address extends Database 
{
    public function getAllAddress()
    {
        return $this->getAll('adresse');
    }
    public function getOneAddress( $value )
    {
        return $this->getOne( 'adresse', 'id', $value );
    }
    public function getOneAddressById( $value )
    {
        return $this->getOne( 'adresse', 'user_id', $value );
    }
    public function addOneAddress( $data )
    {
        $this->addOne( 'adresse', 'user_id, nb_voie, type_voie, nom_voie, code_postal, ville, telephone, type_livraison, nom, prenom, type_paiement', '?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', $data );
    }

    public function updateAddress( $data, $id )
    {
        $this->updateOne( 'adresse', $data, 'id', $id );
    }

    public function deleteAddress($id)
    {
        $sql = "DELETE FROM adresse WHERE id = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}
?>