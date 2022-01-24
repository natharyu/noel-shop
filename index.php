<?php

session_start();

if( isset( $_GET['view'] ) && !empty( $_GET['view'] ) ) {
    $view = $_GET['view'];
}
else
{
    $view = 'front/home';
}

include 'template.php';

?>