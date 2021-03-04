<?php

require_once "import.php";

$randoManager = new RandoManager();

if(isset($_GET['mod'])){
    if(isset($_POST, $_POST["avalide"], $_POST["name"], $_POST["difficulty"], $_POST["distance"], $_POST["heure"], $_POST["minute"], $_POST["height_difference"])){
        print_r($_POST);
        if($_POST["minute"] < 10){
            $_POST["minute"] = "0" . strval($_POST["minute"]);
        }

        if($_POST["avalide"] === "yes"){
            $valide = 1;
        }
        else{
            $valide = 0;
        }
        $rando = new Rando();
        $rando
            ->setName(sanitize($_POST["name"]))
            ->setDifficulty(sanitize($_POST["difficulty"]))
            ->setDistance(sanitize($_POST["distance"]))
            ->setDuration(sanitize($_POST["heure"]) . "h" . sanitize($_POST["minute"]))
            ->setHeightDifference(sanitize($_POST["height_difference"]))
            ->setAvalide($valide);
        print_r($rando);
    }
    if($_GET["mod"] === "1"){
        print_r($rando);
        $randoManager->insert($rando);
    }
    elseif($_GET["mod"] === "2"){
        $randoManager->update($rando);
    }
    header("Location: ./read.php?success=true");
}
else{
    echo "error";
}