<?php
include "./import.php";

if(isset($_POST['name'], $_POST["pass"])){
    $find = false;
    session_start();
    $userManager = new UserManager();
    foreach($userManager->getUsers() as $user){
        if($user->getName() === sanitize($_POST["name"]) && password_verify(sanitize($_POST["pass"]), $user->getPass())){
            $userFind = $user;
            $find = true;
            break;
        }
    }
    if($find){
        $_SESSION["connected"] = true;
        header("Location: ./read.php");
    }
    else{
        $_SESSION["connected"] = false;
        header("Location: ./read.php");
    }
}



