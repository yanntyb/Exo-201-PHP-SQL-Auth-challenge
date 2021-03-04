<?php

session_start();
$_SESSION["connected"] = false;
header("Location: ./read.php");