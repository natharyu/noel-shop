<?php

include_once 'Database.php';

class ProductCat extends Database {
    public function getAllProductCat()
    {
        return $this->getAll('product_cat');
    }
    
    public function getOneProductCat( $value )
    {
        return $this->getOne( 'product_cat', 'name', $value );
    }
    public function getOneProductCatById( $value )
    {
        return $this->getOne( 'product_cat', 'id', $value );
    }
    
    public function addOneProductCat( $data )
    {
        $this->addOne( 'product_cat', 'name', '?', $data );
    }

    public function updateProductCat( $data, $id )
    {
        $this->updateOne( 'product_cat', $data, 'id', $id );
    }
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM product_cat WHERE id = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}
?>