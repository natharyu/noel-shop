<?php

include_once 'Database.php';

class Waytype extends Database 
{
    public function getAllWaytype()
    {
        return $this->getAll('type_voie');
    }
    public function getOneWaytype( $value )
    {
        return $this->getOne( 'type_voie', 'id', $value );
    }
    public function getOneWaytypeById( $value )
    {
        return $this->getAllOne( 'type_voie', 'user_id', $value );
    }
    public function getOneWaytypeByName( $value )
    {
        return $this->getOne( 'type_voie', 'name', $value );
    }
    public function addOneWaytype( $data )
    {
        $this->addOne( 'type_voie', 'name', '?', $data );
    }

    public function updateWaytype( $data, $id )
    {
        $this->updateOne( 'type_voie', $data, 'id', $id );
    }

    public function deleteWaytype($id)
    {
        $sql = "DELETE FROM type_voie WHERE id = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}