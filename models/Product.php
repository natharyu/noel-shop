<?php

include_once 'Database.php';

class Product extends Database {
    public function getAllProducts()
    {
        return $this->getAll('product');
    }
    
    public function getOneProduct( $value )
    {
        return $this->getOne( 'product', 'name', $value );
    }
    public function getOneProductById( $value )
    {
        return $this->getOne( 'product', 'id', $value );
    }    
    public function addOneProduct( $data )
    {
        $this->addOne( 'product', 'name, description, image, stock_quantity, price, category', '?, ?, ?, ?, ?, ?', $data );
    }

    public function updateProduct( $data, $id )
    {
        $this->updateOne( 'product', $data, 'id', $id );
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}
