<?php

include "./Classes/DB.php";
include "./Entity/User.php";
include "./Manager/UserManager.php";

$userManager = new UserManager();

$users = $userManager->getUsers();

foreach ($users as $user){
    $userManager->passAsh($user);
    echo $user->getPass() . "<br>";
    echo "ok";
}