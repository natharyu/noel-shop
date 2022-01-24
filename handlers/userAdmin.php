<?php

include_once '../models/User.php';

if (isset ($_GET['id']) && !empty( $_GET['id']) )
    {
        $userAdmin = new User();
        $userAdmin->userModify('admin', $_GET['id']);
    }

header( 'Location: ../index.php?view=dashboard/users');
exit();

?>