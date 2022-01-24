<?php

include_once '../models/Address.php';

try
{
    if( isset( $_POST['id'] ) && !empty( $_POST['id'] ) &&
        isset( $_POST['nom'] ) && !empty( $_POST['nom'] ) &&
        isset( $_POST['prenom'] ) && !empty( $_POST['prenom'] ) &&
        isset( $_POST['nb_voie'] ) && !empty( $_POST['nb_voie'] ) &&
        isset( $_POST['waytype'] ) && !empty( $_POST['waytype'] ) &&
        isset( $_POST['nom_voie'] ) && !empty( $_POST['nom_voie'] ) &&
        isset( $_POST['code_postal'] ) && !empty( $_POST['code_postal'] ) &&
        isset( $_POST['ville'] ) && !empty( $_POST['ville'] ) &&
        isset( $_POST['deliverytype'] ) && !empty( $_POST['deliverytype'] ) &&
        isset( $_POST['telephone'] ) && !empty( $_POST['telephone'] ) )
    {
        $newAddress = new Address();
        $addresse = $newAddress->getOneAddressById($_POST['id']);

        $newAddressData = [
            'nb_voie'=>$_POST['nb_voie'],
            'type_voie'=>$_POST['waytype'],
            'nom_voie'=>$_POST['nom_voie'],
            'code_postal'=>$_POST['code_postal'],
            'ville'=>$_POST['ville'],
            'telephone'=>$_POST['telephone'],
            'type_livraison'=>$_POST['deliverytype'],
            'nom'=>$_POST['nom'],
            'prenom'=>$_POST['prenom'],
        ];

        $newAddress->updateAddress( $newAddressData, $_POST['id']);

        header('Location: ../index.php?view=/front/payment');
        exit();
    }
    else
    {
        throw new Exception( 'Remplissez tous les champs' );
    }
}

catch( Exception $e)
{
    header( 'Location: ../index.php?view=front/order&error=' . $e->getMessage() );
    exit();
}

?>