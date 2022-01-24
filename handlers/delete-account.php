<?php

include_once '../models/User.php';

if (isset ($_GET['id']) && !empty( $_GET['id']) )
    {
        $newUser = new User();
        $newUser->deleteUser($_GET['id']);
    }

header( 'Location: ../index.php?view=dashboard/users');
exit();

?>