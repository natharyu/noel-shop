<?php

include_once 'models/User.php';

$newUser = new User();
$users = $newUser->getAllUsers();

?>
<div class="column" id="dashboardUsers">
    <div class="card">
        <div class="column">
            <h1 class="glow">Tous les utilisateurs</h1>
            <a class="button" href="index.php?view=dashboard/home"><i class="fas fa-long-arrow-alt-left"></i> Retour au panneau d'administration</i></a>
        
            <table class="table">
                <thead class="tableUser">
                    <tr>
                        <th>Utilisateur</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="tableUser">
        
                    <?php foreach( $users as $user ) : ?>
        
                    <tr>
                        <td class="userSelect">
                            <a href="index.php?view=dashboard/user&id=<?= $user['id'] ?>"><?= $user['username'] ?></a>
                        </td>
                        <td>
                            <?= $user['role'] ?>
                        </td>
                        <td>
                            <a class="button" href="handlers/delete-account.php?id=<?= $user['id'] ?>"><i class="fas fa-user-minus"></i> Supprimer l'utilisateur</a>
                                                
                           <?php if ($user['role'] === 'client') :?>
                               <a class="roleAdmin" href="handlers/userAdmin.php?id=<?= $user['id'] ?>">Passer Admin</a>
                               <a class="button" href="handlers/userPrep.php?id=<?= $user['id'] ?>">Passer Préparateur</a>
                
                            <?php elseif ($user['role'] === 'admin' ) :?>
                               <a class="button" href="handlers/userNormal.php?id=<?= $user['id'] ?>">Passer client</a>
                               <a class="button" href="handlers/userPrep.php?id=<?= $user['id'] ?>">Passer Préparateur</a>

                            <?php else :?>
                                <a class="roleAdmin" href="handlers/userAdmin.php?id=<?= $user['id'] ?>">Passer Admin</a>
                                <a class="button" href="handlers/userNormal.php?id=<?= $user['id'] ?>">Passer Client</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    
        
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>