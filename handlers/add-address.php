<?php

include_once '../models/Address.php';
include_once '../models/Way_type.php';
include_once '../models/Delivery.php';
include_once '../models/Payment.php';

try
{
        if(isset( $_POST['id'] ) && !empty( $_POST['id'] ) &&
        isset( $_POST['nom'] ) && !empty( $_POST['nom'] ) &&
        isset( $_POST['prenom'] ) && !empty( $_POST['prenom'] ) &&
        isset( $_POST['nb_voie'] ) && !empty( $_POST['nb_voie'] ) &&
        isset( $_POST['waytype'] ) && !empty( $_POST['waytype'] ) &&
        isset( $_POST['nom_voie'] ) && !empty( $_POST['nom_voie'] ) &&
        isset( $_POST['code_postal'] ) && !empty( $_POST['code_postal'] ) &&
        isset( $_POST['ville'] ) && !empty( $_POST['ville'] ) &&
        isset( $_POST['deliverytype'] ) && !empty( $_POST['deliverytype'] ) &&
        isset( $_POST['telephone'] ) && !empty( $_POST['telephone'] ) &&
        isset( $_POST['payment'] ) && !empty( $_POST['payment'] ))
    {
        $newAddress = new Address();
        
        $newWaytype = new Waytype();
        $waytype = $newWaytype->getOneWaytypeByName($_POST['waytype']);
        
        $newDelivery = new Delivery();
        $delivery = $newDelivery->getOneDeliveryByName($_POST['deliverytype']);
        
        $newPayment = new Payment();
        $payment = $newPayment->getOnePaymentByName($_POST['payment']);
        
        $newAddressData = [
            $_POST['id'],
            $_POST['nb_voie'],
            $waytype['id'],
            $_POST['nom_voie'],
            $_POST['code_postal'],
            $_POST['ville'],
            $_POST['telephone'],
            $delivery['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $payment['id']
            
        ];
        
        $newAddress->addOneAddress($newAddressData);
        
        header("Location: ../index.php?view=/front/order&id=" . $_POST['id']);
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