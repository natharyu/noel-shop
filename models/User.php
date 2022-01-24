<?php

include_once 'Database.php';


class User extends Database 
{
    public function getAllUsers()
    {
        return $this->getAll('users');
    }
    
    public function getOneUser( $value )
    {
        return $this->getOne( 'users', 'username', $value );
    }
    public function getOneUserById( $value )
    {
        return $this->getOne( 'users', 'id', $value );
    }
    
    public function addOneUser( $data )
    {
        $this->addOne( 'users', 'username, password, email, role', '?, ?, ?, ?', $data );
    }

    public function updateUser( $data, $id )
    {
        $this->updateOne( 'users', $data, 'id', $id );
    }
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
    public function userModify($role, $id)
    {
        $sql = "UPDATE users SET role = '$role' WHERE id = ? "; 
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}