<?php

function sanitize($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);

    return $data;
}

require_once "./Classes/DB.php";
require_once "./Entity/Rando.php";
require_once "./Manager/RandoManager.php";

require_once "./Entity/User.php";
require_once "./Manager/UserManager.php";



