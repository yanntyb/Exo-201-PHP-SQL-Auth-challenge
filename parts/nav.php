<link rel="stylesheet" href="./css/nav.css">

<div id="nav">
    <a href="read.php">Read</a>
    <a href="formInsert.php">Insert</a>
    <?php if(isset($_SESSION , $_SESSION["connected"])){
        if($_SESSION["connected"]){?>
            <a href="./disconnect.php">Disconnect</a><?php
        }
    }
    else{?>
        <a href="./index.php">Login</a><?php
    }?>

</div>